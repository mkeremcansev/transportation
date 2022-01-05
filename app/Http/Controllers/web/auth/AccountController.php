<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('individual')) :
            $offers = Offer::with(['getOfferTopic.getUserInfo', 'getOfferTopic.getDepartureRoute', 'getOfferTopic.getArrivalRoute'])->where('user_id', Auth::user()->id)->get();
            return view('web.account.index', compact('offers'));
        elseif (Auth::user()->hasRole('institutional')) :
            $topics = Topic::where('user_id', Auth::user()->id)->get();
            return view('web.account.index', compact('topics'));
        endif;
    }
}
