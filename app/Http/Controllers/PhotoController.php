<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    /*** Adjust these once to perfectly match your poster ***/
    private const POSTER_PATH   = 'frames/marathon_poster.png'; // storage/app/public/...
    private const FACE_SIZE     = 520;  // circle diameter in px
    private const FACE_X        = 140;  // top-left X where the face image is inserted
    private const FACE_Y        = 190;  // top-left Y where the face image is inserted
    private const NAME_X        = 330;  // text center X for name
    private const NAME_Y        = 880;  // text baseline Y for name
    private const NAME_SIZE     = 54;
    private const NAME_COLOR    = '#FFFFFF';
    private const CAT_X         = 330;  // text center X for category
    private const CAT_Y         = 940;
    private const CAT_SIZE      = 36;
    private const CAT_COLOR     = '#FF9900';

    function photo()
    {
        return view('photo.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'digits_between:10,12'], // relax if needed
        ]);

        session(['avatar_mobile' => $request->mobile]);

        // If there are no rows for this mobile, keep UX friendly
        $count = User::where('mobile', $request->mobile)->count();
        if ($count === 0) {
            return back()->withErrors(['mobile' => 'No registrations found for this phone number.']);
        }

        return redirect()->route('select');
    }

    public function selectParticipant()
    {
        $mobile = session('avatar_mobile');
        if (!$mobile) return redirect()->route('avatar.login.form');

        $participants = User::where('mobile', $mobile)->orderBy('name')->get();
        return view('photo.select', compact('participants', 'mobile'));
    }

    public function uploadForm(User $participant)
    {
        $this->ensureOwner($participant);
        return view('photo.upload', compact('participant'));
    }

    public function upload(Request $request, User $participant)
    {
        $this->ensureOwner($participant);

        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:4096'],
        ]);

        // Save uploaded face photo
        $path = $request->file('photo')->store('participants', 'public');
        $participant->update(['photo_path' => $path]);

        // Create poster
        $this->generatePoster($participant);

        return redirect()->route('preview', $participant);
    }

    public function preview(User $participant)
    {
        $this->ensureOwner($participant);

        // if poster not present (e.g., cleared), regenerate if photo exists
        if (!$participant->poster_path && $participant->photo_path) {
            $this->generatePoster($participant);
        }

        return view('photo.preview', compact('participant'));
    }

    public function download(User $participant)
    {
        $this->ensureOwner($participant);

        abort_unless($participant->poster_path && Storage::disk('public')->exists($participant->poster_path), 404);

        return response()->download(
            storage_path('app/public/' . $participant->poster_path),
            'marathon-poster-' . $participant->id . '.png'
        );
    }

    /*** Utils ***/
    private function ensureOwner(User $participant): void
    {
        $mobile = session('avatar_mobile');
        abort_if(!$mobile || $participant->mobile !== $mobile, 403);
    }

    private function generatePoster(User $participant): void
    {
        // abort_unless($participant->photo_path, 400, 'Upload photo first');

        // 1) Base poster
        $poster = Image::make(storage_path('app/public/' . self::POSTER_PATH));

        // 2) Face -> crop square -> resize -> circle mask
        $face = Image::make(storage_path('app/public/' . $participant->photo_path));

        // Make a centered square of the shortest side
        $min = min($face->width(), $face->height());
        $face->crop($min, $min, intval(($face->width() - $min) / 2), intval(($face->height() - $min) / 2))
            ->resize(self::FACE_SIZE, self::FACE_SIZE);

        $mask = Image::canvas(self::FACE_SIZE, self::FACE_SIZE);
        $mask->circle(self::FACE_SIZE, intval(self::FACE_SIZE / 2), intval(self::FACE_SIZE / 2), function ($draw) {
            $draw->background('#fff');
        });
        $face->mask($mask, false);

        // 3) Composite onto poster at desired coordinates
        $poster->insert($face, 'top-left', self::FACE_X, self::FACE_Y);

        // 4) Text (Name)
        $poster->text(mb_strtoupper($participant->name), self::NAME_X, self::NAME_Y, function ($font) {
            $fontFile = public_path('fonts/Montserrat-Bold.ttf');
            if (file_exists($fontFile)) $font->file($fontFile);
            $font->size(self::NAME_SIZE);
            $font->color(self::NAME_COLOR);
            $font->align('center');
            $font->valign('bottom');
        });

        // 5) Text (Category / distance)
        if ($participant->category) {
            $poster->text($participant->category, self::CAT_X, self::CAT_Y, function ($font) {
                $fontFile = public_path('fonts/Montserrat-Bold.ttf');
                if (file_exists($fontFile)) $font->file($fontFile);
                $font->size(self::CAT_SIZE);
                $font->color(self::CAT_COLOR);
                $font->align('center');
                $font->valign('bottom');
            });
        }

        // 6) Save
        $out = 'certificates/poster_' . $participant->id . '.png';
        Storage::disk('public')->makeDirectory('certificates');
        $poster->save(storage_path('app/public/' . $out));

        $participant->update(['poster_path' => $out]);
    }
}
