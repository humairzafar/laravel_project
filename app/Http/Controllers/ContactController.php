<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function hello(Request $request)
    {
        $filename= time(). "-md." . $request->file('image')->getClientOriginalExtension();
        echo $request->file('image')->storeAs('uploads' ,$filename);
    }
}
