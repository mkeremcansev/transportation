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
        $('#topic_create').on('click', function(e){
            e.preventDefault();
            let topic_create_button = $('#topic_create')
            let where_from_city =  $('#where_from_city').val()
            let where_from_province = $('#where_from_province').val()
            let to_where_city = $('#to_where_city').val()
            let to_where_province = $('#to_where_province').val()
            let topic_create_purchase_date = $('#topic_create_purchase_date').val()
            let topic_create_delivery_date = $('#topic_create_delivery_date').val()
            let product_type = $('#product_type').val()
            let product_quantity = $('#product_quantity').val()
            let product_description = $('#product_description').val()
            let vehicle_type = $('#vehicle_type').val()
            let topic_price = $('#topic_price').val()
            let topic_delivery = $('#topic_delivery').val()
            let topic_tax_element = $('#topic_tax')
            let topic_tax
            topic_tax_element.prop('checked') ? topic_tax = 1 : topic_tax = 0
            let topic_create_after_hidden = $('.box_general_3')
            let topic_create_after_append = $('.col-lg-8')
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
                    topic_delivery:topic_delivery,
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
@include('web.topic.create.layouts.breadcrumb')
@include('web.topic.create.layouts.value')
@endsection