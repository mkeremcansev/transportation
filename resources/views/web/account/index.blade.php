@extends('web.layouts.main')
@section('title')
    asdas
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#profile_path_submit').on('click', function(e){
                e.preventDefault()
                let profile_path_change_form = $('#nav-home')
                profile_path_change_form.addClass('general_disabled')
                let formData = new FormData();
                formData.append("profile_path", $("#profile_path").prop("files")[0]);
                $.ajax({
                    method: 'POST',
                    url: '{{ route("web.profile_path.change.update") }}',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response){
                        iziToast.success({
                            message: response.success
                        })
                        setTimeout(() => {
                            location.reload()
                        }, 1500);
                    },
                    error: function(response){
                        iziToast.error({
                            message: validateError(response)
                        })
                        profile_path_change_form.removeClass('general_disabled')
                    }
                })
            })
            $('#password_change_submit').on('click', function(e){
                e.preventDefault()
                let password_change_form = $('#nav-contact')
                password_change_form.addClass('general_disabled')
                let old_password = $('#old_password').val()
                let new_password = $('#new_password').val()
                $.ajax({
                    method: 'POST',
                    url: '{{ route("web.password.change.update") }}',
                    data: {
                        old_password:old_password,
                        new_password:new_password
                    },
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 201){
                            iziToast.error({
                                message: response.message
                            })
                            password_change_form.removeClass('general_disabled')
                        } else if(response.status == 200) {
                            iziToast.success({
                                message: response.message
                            })
                            setTimeout(() => {
                                location.reload()
                            }, 1500);
                        }
                    },
                    error: function(response){
                        iziToast.error({
                            message: validateError(response)
                        })
                        password_change_form.removeClass('general_disabled')
                    }
                })
            })
        })
    </script>
@if ($message = Session::get('success'))
    <script>
        iziToast.success({
            message: '{{ $message }}'
        })
    </script>
@endif
@endsection
@section('content')
<div id="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{ route('web.index') }}">@lang('words.homepage')</a></li>
            <li class="general_disabled">@lang('words.profile')</li>
            <li>{{ Auth::user()->name }}</li>
        </ul>
    </div>
</div>
<div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="box_general_3 cart">
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active text-dark" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">@lang('words.general_info')</button>
                        <button class="nav-link text-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                        <button class="nav-link text-dark" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">@lang('words.password_change')</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form class="mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.name')"  id="name_institutional" value="{{ Auth::user()->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.surname')"  id="surname_institutional" value="{{ Auth::user()->surname }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="@lang('words.email')"  id="email_institutional" value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.phone')"  id="phone_institutional" value="{{ Auth::user()->phone }}" disabled>
                                    </div>
                                </div>
                                @role('institutional')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.tax_city')"  id="tax_city_institutional" value="{{ Auth::user()->getUserTaxCity->title }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.tax_province')"  id="tax_province_institutional" value="{{ Auth::user()->getUserTaxProvince->title ?? __('words.center') }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.tax_no')"  id="tax_no_institutional" value="{{ Auth::user()->tax_no }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_path" class="topic_detail_check_btn">@lang('words.profile_path')<i class="icon-search"></i></label>
                                        <input type="file" class="form-control" placeholder="@lang('words.profile_path')"  id="profile_path" hidden>
                                    </div>
                                </div>
                                @endrole
                                @role('individual|moderator|admin')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="profile_path" class="topic_detail_check_btn">@lang('words.profile_path')<i class="icon-search"></i></label>
                                        <input type="file" class="form-control" placeholder="@lang('words.profile_path')"  id="profile_path" hidden>
                                    </div>
                                </div>
                                @endrole
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.adress')" id="address_institutional" value="{{ Auth::user()->adress }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a class="topic_detail_check_btn" id="profile_path_submit">@lang('words.update')</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form class="mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.name')"  id="name_institutional">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.surname')"  id="surname_institutional">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="@lang('words.email')"  id="email_institutional">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.phone')"  id="phone_institutional">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-select" id="tax_city_institutional">
                                            <option value="" selected>@lang('words.tax_city')</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-select" id="tax_province_institutional">
                                            <option value=""  selected>@lang('words.tax_province')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.tax_no')"  id="tax_no_institutional">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('words.adress')" id="address_institutional">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="@lang('words.password')" id="password_institutional">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="@lang('words.password_repeat')" id="password_repeat_institutional">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                            <div class="form-group mt-2">
                                    <div class="checkboxes">
                                        <label class="container_check">@lang('words.user_contract')</a>
                                            <input type="checkbox" id="contract_institutional">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                </div>
                                </div>
                            <div>
                                <a class="topic_detail_check_btn" id="institutional_submit">@lang('words.register')</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <form class="mt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="@lang('words.old_password')"  id="old_password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="@lang('words.new_password')"  id="new_password">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a class="topic_detail_check_btn" id="password_change_submit">@lang('words.update')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <aside class="col-xl-3 col-lg-3" id="sidebar">
            <div class="box_general_3 booking">
                    <div class="row">
                        <img src="{{ asset(Auth::user()->profile_path) }}" alt="asdasd" class="img-fluid rounded-circle">
                    </div>
            </div>
        </aside>
    </div>
</div>

@endsection