<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index () {
        return view('frontend.about.index')
                    ->with('about', About::first());
    }
}
