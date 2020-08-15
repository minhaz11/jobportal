<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $jobs = Job::latest()->get()->take(5);
        return view('frontend.landing',compact('jobs','categories'));
    }
}
