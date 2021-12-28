@extends('web.layouts.main')
@section('title')
asdasdasdsa    
@endsection
@section('script')
@if ($message = Session::get('success'))
    <script>
        iziToast.success({
            message: '{{ $message }}'
        })
    </script>
@endif
@endsection
@section('content')
    <div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="box_general_3 cart">
                <p class="text-center">@lang('words.unverified_description', ['button'=>__('words.email_verify_link_send')])</p>
                <a href="{{ route('verification.send') }}" class="topic_detail_check_btn @if(Session::get('success')) general_disabled @endif">@lang('words.email_verify_link_send')</a>
            </div>
        </div>

    </div>
</div>
@endsection