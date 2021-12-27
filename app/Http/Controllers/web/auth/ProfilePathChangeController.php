<?php

namespace App\Http\Controllers\web\auth;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePathChangeController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'profile_path' => 'required|mimes:png,jpg,jpeg',
        ]);
        Helper::deleteOldImage(Auth::user()->profile_path);
        User::findOrFail(Auth::user()->id)->update([
            'profile_path' => Helper::imageUpload($request->file('profile_path'), 'storage'),
        ]);
        return response()->json([
            'success' => __('words.action_success')
        ]);
    }
}
