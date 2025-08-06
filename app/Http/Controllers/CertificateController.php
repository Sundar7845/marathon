<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    function generateCertificate(Request $request)
    {
        $user = User::where('mobile', $request->mobile)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $pdf = Pdf::loadView('certificate', [
            'user' => $user
        ]);

        return $pdf->download('Marathon-Certificate.pdf');
    }
}
