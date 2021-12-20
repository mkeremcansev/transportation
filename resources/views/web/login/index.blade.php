@extends('web.layouts.main')
@section('title')
    asdasdsa
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#user_login').on('click', function(){
            var email_adress = $('#email_adress').val()
            var password = $('#password').val()
            var login_form = $('#login_form')
            login_form.addClass('general_disabled')
            $.ajax({
                method: 'POST',
                url: '{{ route("web.login.store") }}',
                data: {email_adress:email_adress, password:password},
                dataType: 'json',
                success: function(response){
                    
                    if(response.status == 201){
                        iziToast.error({
                            message: response.message
                        })
                        login_form.removeClass('general_disabled')
                    } else if(response.status == 200) {
                        iziToast.success({
                            message: response.message
                        })
                        setTimeout(() => {
                            location.href = '{{ route("web.index") }}'
                        }, 1000);
                    }
                },
                error: function(response){
                    iziToast.error({
                        message: validateError(response)
                    })
                    login_form.removeClass('general_disabled')
                }
            })
        })
    })
</script>
@endsection
@section('content')
<div class="bg_color_2">
    <div class="container margin_60_35">
        <div id="login-2">
            <h1>Please login to Findoctor!</h1>
            <form>
                <div class="box_form clearfix">
                    <div class="box_login">
                        <a href="javascript:void()" class="social_bt facebook">@lang('words.follow_us_facebook')</a>
                        <a href="javascript:void()" class="social_bt instagram">@lang('words.follow_us_instagram')</a>
                        <a href="javascript:void()" class="social_bt twitter">@lang('words.follow_us_twitter')</a>
                    </div>
                    <div id="login_form" class="box_login last">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="@lang('words.email_adress')" id="email_adress">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="@lang('words.password')" name="password" id="password">
                            <a href="javascript:void()" class="forgot"><small>@lang('words.forgot_password')</small></a>
                        </div>
                        <div class="form-group">
                           <a  id="user_login" class="topic_detail_check_btn mb-3">@lang('words.login')</a>
                        </div>
                    </div>
                </div>
            </form>
            <p class="text-center link_bright">@lang('words.do_not_have_an_account')<a class="ms-1" href="{{ route('web.register.index') }}"><strong>@lang('words.register')</strong></a></p>
        </div>
    </div>
</div>
@endsection