<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    public function show($slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
        if ($topic->status == 1) :
            return view('web.topic.index', compact('topic'));
        else :
            return back()->with('error', __('words.topic_not_active'));
        endif;
    }
    public function location(Request $request)
    {
        $provinces = City::where('parent_id', $request->city)->get();
        return response()->json([json_encode($provinces)]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'where_from_city' => 'required|integer',
            'where_from_province' => 'required|integer',
            'to_where_city' => 'required|integer',
            'to_where_province' => 'required|integer',
            'topic_create_purchase_date' => 'required|max:255',
            'topic_create_delivery_date' => 'required|max:255',
            'product_type' => 'required|max:255',
            'product_quantity' => 'required|max:255',
            'product_description' => 'required|max:255',
            'vehicle_type' => 'required|integer',
            'topic_price' => 'required|integer',
            'topic_delivery' => 'required|integer',
            'topic_tax' => 'required|integer',
        ]);
        $departure_route = '';
        $arrival_route = '';
        $request->where_from_province == 0
            ? $departure_route = $request->where_from_city
            : $departure_route = $request->where_from_province;
        $request->to_where_province == 0
            ? $arrival_route = $request->to_where_city
            : $arrival_route = $request->to_where_province;
        Topic::create([
            'slug' => Str::slug($request->product_description . $departure_route),
            'purchase_date' => $request->topic_create_purchase_date,
            'delivery_date' => $request->topic_create_delivery_date,
            'product_type' => $request->product_type,
            'product_quantity' => $request->product_quantity,
            'product_description' => $request->product_description,
            'vehicle_type' => $request->vehicle_type,
            'departure_route' => $departure_route,
            'arrival_route' => $arrival_route,
            'user_id' => Auth::user()->id,
            'price' => $request->topic_price,
            'delivery' => $request->topic_delivery,
            'tax' => $request->topic_tax,
            'status' => 0
        ]);
        return response()->json([
            'success' => __('words.added_success')
        ]);
    }
}
