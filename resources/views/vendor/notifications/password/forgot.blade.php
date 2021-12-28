@extends('web.layouts.main')
@section('title')
asdasdasdsa    
@endsection
@section('script')
@if ($message = Session::get('status'))
    <script>
        iziToast.success({
            message: '{{ $message }}'
        })
    </script>
@endif
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
               <form action="{{ route('password.email') }}" method="POST">
                   @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="@lang('words.email_adress')">
                            </div>
                        </div>
                    </div>
                     <button class="topic_detail_check_btn1" type="submit">@lang('words.password_reset_link_send')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection