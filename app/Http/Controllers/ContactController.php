<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $con = contact::all();
        return view('users.contact' , compact('con'));
    }

    public function upload_contact(Request $request) {
        $con = new contact();
        $con->name = $request->name;
        $con->email = $request->email;
        $con->phone = $request->phone;
        $con->service = $request->service;
        $con->date = $request->date;
        $con->time = $request->time;
        $con->message = $request->message;
        $con->save();

        // Set success message in session
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

}
