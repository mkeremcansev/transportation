<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    public function send()
    {
        Auth::user()->sendEmailVerificationNotification();
        return back()->with('success', __('words.email_verify_link_send_success'));
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        $request->session()->flash('success', __('words.email_verified_success'));
        return redirect()->route('web.account.index');
    }
}
