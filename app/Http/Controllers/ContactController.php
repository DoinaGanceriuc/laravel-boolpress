<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_Data = $request->validate([
            'name' => 'required|min:3|max:80',
            'email' => 'required',
            'subject' => 'required|min:5|max:20',
            'message' => 'required|min:30',
        ]);

        //ddd($validated_Data);
        $contact = Contact::create($validated_Data);

        //return (new ContactMail($contact))->render();
        Mail::to('admin@example.com')->send(new ContactMail($contact));

        return redirect()->back()->with('message', 'Mail inviata correttamente');
    }

}
