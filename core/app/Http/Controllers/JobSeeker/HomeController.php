<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('jobseeker.profile');
    }
}
