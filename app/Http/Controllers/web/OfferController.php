<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'topic_id' => 'required',
        ]);
        $topic = Topic::findOrFail($request->topic_id);
        $offer = Offer::where('topic_id', $topic->id)->where('user_id', Auth::user()->id)->count();
        if ($offer) :
            return response()->json(['message' => __('words.offer_user_have'), 'status' => 201]);
        else :
            Offer::create([
                'topic_id' => $request->topic_id,
                'user_id' => Auth::user()->id
            ]);
            return response()->json(['message' => __('words.offer_send_success'), 'status' => 200]);
        endif;
    }
}
