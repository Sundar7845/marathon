<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    function generateCertificate(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10|exists:users,mobile',
            'name'   => 'required'
        ], [
            'mobile.required' => 'Mobile number is required.',
            'mobile.digits'   => 'Mobile number must be exactly 10 digits.',
            'mobile.exists'   => 'This mobile number is not registered.',
            'name.required'   => 'Name is required.',
        ]);

        $user = User::where('mobile', $request->mobile)->where('name', $request->name)->first();

        if (!$user) {
            return back()->withErrors([
                'name' => 'The name does not match with this mobile number.',
            ])->withInput();
        }

        // $pdf = Pdf::loadView('certificate', [
        //     'user' => $user
        // ]);

        // return $pdf->download('Marathon-Certificate.pdf');

        return view('certificate', ['user' => $user]);

    }
}
