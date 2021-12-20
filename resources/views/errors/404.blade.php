@extends('web.layouts.main')
@section('title')
    404
@endsection
@section('content')
    <div id="error_page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <h2>404 <i class="icon_error-triangle_alt"></i></h2>
                    <p>{response.404_description}</p>
                </div>
            </div>
        </div>
    </div>
@endsection