@extends('web.layouts.main')
@section('title')
    asdasdas
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#tax_city_institutional').on('change', function(){
                var city = $('#tax_city_institutional').val()
                $.ajax({
                    method: 'POST',
                    url: '{{ route("web.topic.location.store") }}',
                    data: {city:city},
                    dataType: 'json',
                    success: function(response){
                        var province = JSON.parse(response);
                            $("#tax_province_institutional").html("");  
                            $("#tax_province_institutional").append("<option value='' disabled selected>@lang('words.tax_province')</option>");
                            $("#tax_province_institutional").append("<option value='0'>@lang('words.center')</option>");
                                $.each(province, function(name, id) { 
                                    var obje=province[name]
                                    var provinceData="<option value='"+obje["id"]+"'>"+obje["title"]+"</option>";
                                    $("#tax_province_institutional").append(provinceData);   
                                });
                    }
                })
            })
            $('#institutional_submit').on('click', function(e){
                e.preventDefault()
                let institutional_submit_form = $('#nav-profile')
                institutional_submit_form.addClass('general_disabled')
                let formData = new FormData();
                formData.append("name", $("#name_institutional").val());
                formData.append("surname", $("#surname_institutional").val());
                formData.append("company", $("#company_institutional").val());
                formData.append("email", $("#email_institutional").val());
                formData.append("phone", $("#phone_institutional").val());
                formData.append("tax_city", $("#tax_city_institutional").val());
                formData.append("tax_province", $("#tax_province_institutional").val());
                formData.append("tax_no", $("#tax_no_institutional").val());
                formData.append("adress", $("#address_institutional").val());
                formData.append("password", $("#password_institutional").val());
                formData.append("password_repeat", $("#password_repeat_institutional").val());
                let contract
                $("#contract_institutional").prop('checked') ? contract = 1 : contract = 0
                formData.append("contract", contract);
                formData.append("profile_path", $("#profile_path_institutional").prop("files")[0]);
                $.ajax({
                method: 'POST',
                url: '{{ route("web.register.institutional") }}',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                    success: function(response){
                        iziToast.success({
                            message: response.success
                        })
                        setTimeout(() => {
                            location.href = '{{ route("web.login.index") }}'
                        }, 1500);
                    },
                    error: function(response){
                        iziToast.error({
                            message: validateError(response)
                        })
                        institutional_submit_form.removeClass('general_disabled')
                    }
                })
            })
            $('#individual_submit').on('click', function(e){
                e.preventDefault()
                let individual_submit_form = $('#nav-home')
                individual_submit_form.addClass('general_disabled')
                let formData = new FormData();
                formData.append("name", $("#name_individual").val());
                formData.append("surname", $("#surname_individual").val());
                formData.append("email", $("#email_individual").val());
                formData.append("phone", $("#phone_individual").val());
                formData.append("adress", $("#address_individual").val());
                formData.append("password", $("#password_individual").val());
                formData.append("password_repeat", $("#password_repeat_individual").val());
                let contract
                $("#contract_individual").prop('checked') ? contract = 1 : contract = 0
                formData.append("contract", contract);
                formData.append("profile_path", $("#profile_path_individual").prop("files")[0]);
                $.ajax({
                method: 'POST',
                url: '{{ route("web.register.individual") }}',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                    success: function(response){
                        iziToast.success({
                            message: response.success
                        })
                        setTimeout(() => {
                            location.href = '{{ route("web.login.index") }}'
                        }, 1500);
                    },
                    error: function(response){
                        individual_submit_form.removeClass('general_disabled')
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
<div id="hero_register">
    <div class="container margin_120_95">			
        <div class="row">
            <div class="col-lg-6">
                <h1>It's time to find you!</h1>
                <p class="lead">Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad has, has ei quis iudico, ad mei nonumes periculis.</p>
                <div class="box_feat_2">
                    <i class="pe-7s-map-2"></i>
                    <h3>Let patients to Find you!</h3>
                    <p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</p>
                </div>
                <div class="box_feat_2">
                    <i class="pe-7s-date"></i>
                    <h3>Easly manage Bookings</h3>
                    <p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</p>
                </div>
                <div class="box_feat_2">
                    <i class="pe-7s-phone"></i>
                    <h3>Instantly via Mobile</h3>
                    <p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
                </div>
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="box_form">
                    <nav class="mb-4">
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link text-dark active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">@lang('words.individual')</button>
                            <button class="nav-link text-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">@lang('words.institutional')</button>
                        </div>
                    </nav>
                    <div id="message-register"></div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="@lang('words.name')"  id="name_individual">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="@lang('words.surname')"  id="surname_individual">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="@lang('words.email')"  id="email_individual">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="@lang('words.phone')"  id="phone_individual">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="profile_path_individual" class="topic_detail_check_btn">@lang('words.profile_path')<i class="icon-search"></i></label>
                                            <input type="file" class="form-control" placeholder="profil resmi"  id="profile_path_individual" title="asjkdlhas" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="@lang('words.adress')" id="address_individual">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="@lang('words.password')" id="password_individual">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="@lang('words.password_repeat')" id="password_repeat_individual">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                <div class="form-group mt-2">
                                        <div class="checkboxes">
                                            <label class="container_check">@lang('words.user_contract')</a>
                                                <input type="checkbox" id="contract_individual">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                <div>
                                    <a class="topic_detail_check_btn" id="individual_submit">@lang('words.register')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="@lang('words.company_name')" id="company_institutional">
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profile_path_institutional" class="topic_detail_check_btn">@lang('words.profile_path')<i class="icon-search"></i></label>
                                            <input type="file" class="form-control" placeholder="profil resmi"  id="profile_path_institutional" hidden>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection