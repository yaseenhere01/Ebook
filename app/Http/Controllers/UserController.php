<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Books;
use App\Models\Orders;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthorController;


class UserController extends Controller
{
    public function place_order(Request $request , $id){
        $order = new Orders();
        $book = Books::find($id);

        $order->bookid = $id;
        $order->username = Auth::user()->name;
        $order->bookname = $book->bookname;
        $order->bookimg = $book->image;
        $order->bookfile = $book->file;
        $order->bookauthor = $book->author;
        $order->bookprice = $book->type;
        $order->status = "Pending";
        $order->save();
        return redirect()->back();
    }

    public function cancel_req($id){
        $order = Orders::find($id);
        $order->status = "Cancel";
        $order->save();
        return redirect()->back();
    }



    public function contact(){
        return view('users.contact');
    }

    public function blog(){
        $blog = blog::all();
        return view('users.blog' , compact('blog'));
    }

    public function about() {
        return view('users.about'); // Check that this view file exists
    }


    public function upload_contact(Request $request){
        $con = new contact();
            $con->name = $request->name;
            $con->email = $request->email;
            $con->phone = $request->phone;
            $con->service = $request->service;
            $con->date = $request->date;
            $con->time = $request->time;
            $con->message = $request->message;
            $con->save();
            return redirect()->back();
        }

    public function new(){
        $book = Books::all();
        $status = Orders::all();

        return view('users.comingsoon' , compact('book' , 'status'));
    }







}
