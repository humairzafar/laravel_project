<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class RegisteController extends Controller
{
    public function index()
    {
        return view('form');
    }
    public function register (request $request)
    {
        $request->validate(
        [
            'email' => 'required|email',
            'passsword' => 'required',
        ]
        );
        echo "<pre>";
        print_r($request->all());
    }
}