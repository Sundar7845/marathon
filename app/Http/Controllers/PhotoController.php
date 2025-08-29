<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    function photo()
    {
        return view('photo');
    }
}
