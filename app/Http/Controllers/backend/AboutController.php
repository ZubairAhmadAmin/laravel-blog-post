<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function index() {
        return view('backend.about.index')
                    ->with('about', About::first());
    }

    public function update(Request $request) {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
        ]);

        $about = About::findOrfail(1);
        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->description = $request->description;
        $about->save();

        Session::flash('success', 'About updated successfully!');

        return redirect()->back();
    }
}
