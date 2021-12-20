<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email_adress' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);
        if (Auth::attempt(['email' => $request->email_adress, 'password' => $request->password])) {
            $request->session()->regenerate();
            return response()->json(['message' => 'Giriş işlemi başarıyla gerçekleşti.', 'status' => 200]);
        } else {
            return response()->json(['message' => 'E-Posta adresi veya Şifre yanlış.', 'status' => 201]);
        }
    }
}
