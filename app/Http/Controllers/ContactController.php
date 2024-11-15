<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

           // Send the email
           Mail::to('jerome.porcado11@gmail.com')->send(new ContactMail($request->all()));

           // Redirect to the success page after sending the email
           return redirect()->route('success')->with('success', 'Your message has been sent successfully!');
    }
}

