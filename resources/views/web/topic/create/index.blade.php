@extends('web.layouts.main')
@section('title')
    asdasdas
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#where_from_city').on('change', function(){
            var city = $('#where_from_city').val()
            $.ajax({
                method: 'POST',
                url: '{{ route("web.topic.location.store") }}',
                data: {city:city},
                dataType: 'json',
                success: function(response){
                    var province = JSON.parse(response);
                        $("#where_from_province").html("");  
                        $("#where_from_province").append("<option value='' disabled selected>@lang('words.choose_province')</option>");
                        $("#where_from_province").append("<option value='0'>@lang('words.center')</option>");
                            $.each(province, function(name, id) { 
                                var obje=province[name]
                                var provinceData="<option value='"+obje["id"]+"'>"+obje["title"]+"</option>";
                                $("#where_from_province").append(provinceData);   
                            });
                }
            })
        })
        $('#to_where_city').on('change', function(){
            var city = $('#to_where_city').val()
            $.ajax({
                method: 'POST',
                url: '{{ route("web.topic.location.store") }}',
                data: {city:city},
                dataType: 'json',
                success: function(response){
                    var province = JSON.parse(response);
                        $("#to_where_province").html("");  
                        $("#to_where_province").append("<option value='' disabled selected>@lang('words.choose_province')</option>");
                        $("#to_where_province").append("<option value='0'>@lang('words.center')</option>");
                            $.each(province, function(name, id) { 
                                var obje=province[name]
                                var provinceData="<option value='"+obje["id"]+"'>"+obje["title"]+"</option>";
                                $("#to_where_province").append(provinceData);   
                            });
                }
            })
        })
        $('#topic_create').on('click', function(){
            var topic_create_button = $('#topic_create')
            var where_from_city =  $('#where_from_city').val()
            var where_from_province = $('#where_from_province').val()
            var to_where_city = $('#to_where_city').val()
            var to_where_province = $('#to_where_province').val()
            var topic_create_purchase_date = $('#topic_create_purchase_date').val()
            var topic_create_delivery_date = $('#topic_create_delivery_date').val()
            var product_type = $('#product_type').val()
            var product_quantity = $('#product_quantity').val()
            var product_description = $('#product_description').val()
            var vehicle_type = $('#vehicle_type').val()
            var topic_price = $('#topic_price').val()
            var topic_tax_element = $('#topic_tax')
            let topic_tax
            topic_tax_element.prop('checked') ? topic_tax = 1 : topic_tax = 0
            var topic_create_after_hidden = $('.box_general_3')
            var topic_create_after_append = $('.col-lg-8')
            $.ajax({
                method: 'POST',
                url: '{{ route("web.topic.store") }}',
                data: {
                    where_from_city:where_from_city,
                    where_from_province:where_from_province,
                    to_where_city:to_where_city,
                    to_where_province:to_where_province,
                    topic_create_purchase_date:topic_create_purchase_date,
                    topic_create_delivery_date:topic_create_delivery_date,
                    product_type:product_type,
                    product_quantity:product_quantity,
                    product_description:product_description,
                    vehicle_type:vehicle_type,
                    topic_price:topic_price,
                    topic_tax:topic_tax
                },
                dataType: 'json',
                success: function(response){
                    topic_create_button.addClass('general_disabled')
                    topic_create_after_hidden.slideUp(1000,function() {
					    topic_create_after_hidden.remove();
                        topic_create_after_append
                        .append('<div class="alert alert-success alert-dismissible fade show text-center" role="alert">@lang("words.topic_pending")</div>')
				    });
                },
                error: function(response){
                    iziToast.error({
                        message: validateError(response)
                    })
                }
            })
        })
    })
</script>
@endsection
@section('content')
<div id="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{ route('web.index') }}">@lang('words.homepage')</a></li>
            <li><a>Category</a></li>
            <li>Page active</li>
        </ul>
    </div>
</div>
<div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8">
            <nav>
                <div class="container main_title_4">
							<h3><i class="icon_circle-slelected"></i>@lang('words.general_info')</h3>
                </div>
            </nav>
            <div class="box_general_3 cart">
                <div class="form_title">
                    <h3><strong>1</strong>@lang('words.location_info')</h3>
                </div>
                <div class="step mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <label>@lang('words.where_from')</label>
                            <div class="form-group">
                                <select id="where_from_city" class="form-control">
                                    <option value="" selected>@lang('words.choose_city')</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="where_from_province" class="form-control">
                                    <option value="" selected>@lang('words.choose_province')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>@lang('words.to_where')</label>
                            <div class="form-group">
                                <select id="to_where_city" class="form-control">
                                    <option value="" selected>@lang('words.choose_city')</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="to_where_province" class="form-control">
                                    <option value=""  selected>@lang('words.choose_province')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_title">
                    <h3><strong>2</strong>@lang('words.date_info')</h3>
                </div>
                <div class="step mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.purchase_date')</label>
                                <input class="form-control" type="text" id="topic_create_purchase_date" data-lang="en" data-format="d/m/Y"  data-min-year="2022" data-max-year="2030">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.delivery_date')</label>
                                <input class="form-control" type="text" id="topic_create_delivery_date" data-lang="en" data-format="d/m/Y"  data-min-year="2022" data-max-year="2030">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_title">
                    <h3><strong>3</strong>@lang('words.product_intoformation')</h3>
                </div>
                <div class="step mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.product_type')</label>
                                <input class="form-control" type="text" id="product_type">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.product_quantity')</label>
                                <input class="form-control" type="text" id="product_quantity">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.product_description')</label>
                                <input class="form-control" type="text" id="product_description">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>@lang('words.vehicle_type')</label>
                            <div class="form-group">
                                <select class="form-control" id="vehicle_type">
                                    <option value='' selected>@lang('words.choose_vehicle_type')</option>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_title">
                    <h3><strong>4</strong>@lang('words.general_info')</h3>
                </div>
                <div class="step mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.price')</label>
                                <input class="form-control" type="number" min="0" id="topic_price">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div id="policy">
                                <label>@lang('words.tax')</label>
                                    <div class="form-group mt-2">
                                        <div class="checkboxes">
                                            <label class="container_check">@lang('words.kdv_included')</a>
                                                <input type="checkbox" id="topic_tax">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a  id="topic_create" class="topic_detail_check_btn mb-3">@lang('words.save_and_send')</a>
            </div>
        </div>
    </div>
</div>
@endsection