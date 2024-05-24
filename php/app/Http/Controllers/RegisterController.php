<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register',[
            'title' => 'Register'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:8',
            'email' => 'required|email:dns|unique:users',  
            'telepon' => 'required|max:12|unique:users'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Success! Please Login.');
    }
}
