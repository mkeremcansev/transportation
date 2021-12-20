@extends('web.layouts.main')
@section('title')
    403
@endsection
@section('content')
@auth
    <div id="error_page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <h2>403 <i class="icon_error-triangle_alt"></i></h2>
                    <p>Bu sayfa için izniniz yok. Detaylı bilgi için info@nakilcim.com</p>
                </div>
            </div>
        </div>
    </div>
@else
    <div id="error_page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <h2>403 <i class="icon_error-triangle_alt"></i></h2>
                    <p>Bu sayfayı görmek için giriş yapmalısınız.</p>
                </div>
            </div>
        </div>
    </div>
@endauth

@endsection