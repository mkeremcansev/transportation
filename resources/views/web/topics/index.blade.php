@extends('web.layouts.main')
@section('title')
    asdas
@endsection
@section('script')
    <script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="{{ asset('web/js/markerclusterer.js') }}"></script>
	<script src="{{ asset('web/js/infobox.js') }}"></script>
	@if ($message = Session::get('error'))
        <script>
            iziToast.warning({
                message: '{{ $message }}'
            });
        </script>
    @endif
	@include('web.topics.script.index')
@endsection
@section('content')
@include('web.topics.layouts.result')
@include('web.topics.layouts.filter')
@include('web.topics.layouts.list')
@endsection