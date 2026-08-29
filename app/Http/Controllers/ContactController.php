<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function input(ContactRequest $request){
        $data = $request->validated();

        Mail::to('sevillenaeduc@gmail.com')->send(new ContactMail($data));

        return back()->with('success', 'Message sent!');
    }
}
