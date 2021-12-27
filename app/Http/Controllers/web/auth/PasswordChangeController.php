<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);
        $new_password = '';
        if (Hash::check($request->old_password, Auth::user()->password)) :
            $new_password = Hash::make($request->new_password);
            User::findOrFail(Auth::user()->id)->update([
                'password' => $new_password
            ]);
            return response()->json([
                'message' => __('words.action_success'),
                'status' => '200',
            ]);
        else :
            return response()->json([
                'message' => __('words.old_password_error'),
                'status' => '201',
            ]);
        endif;
    }
}
