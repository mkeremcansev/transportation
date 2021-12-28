@extends('web.layouts.main')
@section('title')
asdasdasdsa    
@endsection
@section('script')
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            iziToast.options = {
                "preventDuplicates": true,
                "preventOpenDuplicates": true
            };
            iziToast.error({
                message: '{{ $error }}'
            })
        </script>
    @endforeach
@endif
@endsection
@section('content')
    <div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-lg-8">
             <nav>
                <div class="container main_title_4">
							<h3><i class="icon_circle-slelected"></i>@lang('words.forgot_password')</h3>
                </div>
            </nav>
            <div class="box_general_3 cart">
               <form action="{{ route('password.update') }}" method="POST">
                   @csrf
                   <input type="hidden" name="token" value="{{ $token }}">
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="@lang('words.email_adress')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="@lang('words.password')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="@lang('words.password_repeat')">
                            </div>
                        </div>
                    </div>
                     <button class="topic_detail_check_btn1" type="submit">@lang('words.password_change')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection