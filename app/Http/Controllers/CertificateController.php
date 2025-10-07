<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    function generateCertificate($id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return back()->withErrors([
                'name' => 'The name does not match with this mobile number.',
            ])->withInput();
        }

        return view('photo.preview', ['user' => $user]);
    }
}
