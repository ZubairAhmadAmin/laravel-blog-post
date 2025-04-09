<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index() {
        return view('frontend.contact.index')
                    ->with('setting', Setting::first());
    }

    public function send(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        Mail::to('zubairamin.learning@gmail.com')->send(new ContactMail($data));

        Session::flash('success', 'Email Send Successfully!');

        return redirect()->back();
    }
}
