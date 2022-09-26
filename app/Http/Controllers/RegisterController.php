<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Sinforman | Register"
        ];

        return view("auth.register", $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|regex:/^[\pL\s]+$/u|min:3",
            "username" => "required|min:3|max:50|unique:users|alpha_dash",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:3|max:255",
        ]);

        Alert::toast('Selamat akun anda berhasil dibuat, silahkan login', 'success');

        // // dd($validatedData);

        $validatedData["password"] = Hash::make($validatedData["password"]);

        User::create($validatedData);

        return redirect("/login")->with('success', 'Selamat');
    }
}
