<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function institutional(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'company' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|max:255|unique:users',
            'tax_city' => 'required|integer',
            'tax_province' => 'required|integer',
            'tax_no' => 'required|integer',
            'adress' => 'required|max:500',
            'password' => 'required|max:30|min:8',
            'password_repeat' => 'required|max:30|same:password',
            'profile_path' => 'required|mimes:jpeg,png,jpg',
            'contract' => 'accepted',
        ]);
        $tax_province = '';
        $request->tax_province == 0
            ? $tax_province = null
            : $tax_province = $request->tax_province;
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'tax_city' => $request->tax_city,
            'tax_province' => $tax_province,
            'tax_no' => $request->tax_no,
            'adress' => $request->adress,
            'profile_path' => Helper::imageUpload($request->file('profile_path'), 'storage'),
            'password' => Hash::make($request->password),
            'hash' => Str::random(15),
        ]);
        $user->assignRole('institutional');
        return response()->json(['success' => __('words.register_action_success')]);
    }

    public function individual(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|max:255|unique:users',
            'adress' => 'required|max:500',
            'password' => 'required|max:30|min:8',
            'password_repeat' => 'required|max:30|same:password',
            'profile_path' => 'required|mimes:jpeg,png,jpg',
            'contract' => 'accepted',
        ]);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'profile_path' => Helper::imageUpload($request->file('profile_path'), 'storage'),
            'password' => Hash::make($request->password),
            'hash' => Str::random(15),
        ]);
        $user->assignRole('individual');
        return response()->json(['success' => __('words.register_action_success')]);
    }
}
