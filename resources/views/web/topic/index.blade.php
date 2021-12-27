@extends('web.layouts.main')
@section('title')
    asdasdas
@endsection
@section('content')
<div id="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{ route('web.index') }}">@lang('words.homepage')</a></li>
            <li><a class="disabled">{{ $topic->getUserInfo->name }}</a></li>
        </ul>
    </div>
</div>
<div class="container margin_60">
    <div class="row">
        <div class="col-xl-7 col-lg-7">
            <nav>
                <div class="container main_title_4">
							<h3><i class="icon_circle-slelected"></i>@lang('words.general_info')</h3>
                </div>
            </nav>
                <div class="box_general_3 text-center">
                    <div class="row">
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-calendar"></i> 
                            <h3>@lang('words.purchase_date')</h3>
                            <p>{{ $topic->purchase_date }}</p>
                        </div>
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-calendar"></i> 
                            <h3>@lang('words.delivery_date')</h3>
                            <p>{{ $topic->delivery_date }}</p>
                        </div>
                    </div>
                </div>
                <div class="box_general_3 text-center">
                    <div class="row">
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-left"></i> 
                            <h3>@lang('words.departure_route')</h3>
                            <p>
                                @if (!is_null($topic->getDepartureRoute->parent_id))
                                    {{ $topic->getDepartureRoute->getMainCity->title .__('words.separator').$topic->getDepartureRoute->title }}
                                @else
                                    {{ $topic->getDepartureRoute->title }}
                                @endif
                            </p>
                        </div>
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-left"></i> 
                            <h3>@lang('words.arrival_route')</h3>
                            <p>
                                @if (!is_null($topic->getArrivalRoute->parent_id))
                                    {{ $topic->getArrivalRoute->getMainCity->title.__('words.separator').$topic->getArrivalRoute->title }}
                                @else
                                    {{ $topic->getArrivalRoute->title }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box_general_3 text-center">
                    <div class="row">
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-inbox"></i> 
                            <h3>@lang('words.product_type')</h3>
                            <p>{{ $topic->product_type }}</p>
                        </div>
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-squares"></i> 
                            <h3>@lang('words.product_quantity')</h3>
                            <p>{{ $topic->product_quantity }}</p>
                        </div>
                    </div>
                </div>
                <div class="box_general_3 text-center">
                    <div class="row">
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-newspaper-1"></i> 
                            <h3>@lang('words.product_description')</h3>
                            <p>{{ $topic->product_description }}</p>
                        </div>
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-traffic-cone"></i> 
                            <h3>@lang('words.vehicle_type')</h3>
                            <p>{{ $topic->getVehicleInfo->title }}</p>
                        </div>
                    </div>
                </div>
                <div class="box_general_3 text-center">
                    <div class="row">
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-view-mode"></i> 
                            <h3>@lang('words.tax')</h3>
                            <p>{{ $topic->tax == 1 ? __('words.kdv_included') : __('words.kdv_not_included') }}</p>
                        </div>
                        <div class="indent_title_in col-lg-6">
                            <i class="icon-money-2"></i> 
                            <h3>@lang('words.price')</h3>
                            <p>{{ $topic->price.__('words.currency_unit') }}</p>
                        </div>
                    </div>
                </div>
                <a href="" class="topic_detail_check_btn mb-3">Teklif gönder</a>
        </div>
        <aside class="col-xl-5 col-lg-5" id="sidebar">
            <div class="main_title_4">
                    <h3><i class="icon-info-circled"></i>@lang('words.company_info')</h3>
                    </div>
            <div class="box_general_3 booking">
                    <div class="row">
                            <div class="col-lg-5">
                                <figure>
                                    <img src="{{ asset($topic->getUserInfo->profile_path) }}" alt="{{ $topic->slug }}" class="img-fluid rounded-circle">
                                </figure>
                            </div>
                            <div class="col-lg-7">
                                <div class="summary">
                                    <ul>
                                        <li>
                                            <i class="icon-right-4"></i>
                                            @lang('words.company_name')
                                            <strong class="float-right ms-1">
                                                {{ $topic->getUserInfo->name }}
                                            </strong>
                                        </li>
                                        <li>
                                            <i class="icon-rss"></i>
                                            @lang('words.joinned_time')
                                            <strong class="float-right ms-1">
                                                {{ $topic->getUserInfo->created_at->format('d.m.Y') }}
                                            </strong>
                                        </li>
                                        <li>
                                            <i class="icon-check-1"></i>
                                            @lang('words.success_action')
                                            <strong class="float-right ms-1">
                                            13
                                            </strong>
                                        </li>
                                        <li>
                                            <i class="icon-cancel-5"></i>
                                            @lang('words.error_action')
                                            <strong class="float-right ms-1">
                                            1
                                            </strong>
                                        </li>
                                        <li>
                                            <i class="icon-phone-1"></i> 
                                            @lang('words.contact')
                                            <strong class="float-right ms-1">
                                            {{ $topic->getUserInfo->phone }}
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </div>
            </div>
        </aside>
    </div>
</div>
@endsection