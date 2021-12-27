@extends('web.layouts.main')
@section('title')
Her zaman daha iyiye!
@endsection
@section('script')
@if($message = Session::get('success'))
    <script>
        iziToast.success({
            message: '{{ $message }}'
        })
    </script>
@endif
@endsection
@section('content')
@include('web.homepage.layouts.banner')
@include('web.homepage.layouts.mechanism')
@include('web.homepage.layouts.reference')
@include('web.homepage.layouts.city')
@include('web.homepage.layouts.application')
@endsection