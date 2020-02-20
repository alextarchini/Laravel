<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /* 1st function */
    public function create()
    {
        $user = Auth::user();
        return view('contact', ['user' => $user]);
    }

    /* 2nd function */
    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'email' => 'required|email',
        'message' => 'required|max:255'
    ]);
    Mail::to('admin@test.com')->send(
        new Contact([
          'nom' => $request->nom, 
          'email' => $request->email, 
          'message' => $request->message
        ])
    );
    return view('confirm');
}
}
