<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
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

        // Always save as "marathon" with original extension
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filename  = $participant->name . $extension;

        // Move file to public/participants
        $request->file('photo')->move(public_path('participants'), $filename);

        // Save path in DB
        $participant->update(['photo_path' => 'participants/' . $filename]);

        return redirect()->route('preview', $participant);
    }

    public function preview(User $participant)
    {
        $this->ensureOwner($participant);

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
}
