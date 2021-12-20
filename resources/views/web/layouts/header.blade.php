<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ setting('title') }} | @yield('title')</title>
	<link rel="shortcut icon" href="{{ asset('web') }}/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('web') }}/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('web') }}/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('web') }}/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('web') }}/img/apple-touch-icon-144x144-precomposed.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="{{ asset('web/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('web/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('web/css/menu.css') }}" rel="stylesheet">
	<link href="{{ asset('web/css/vendors.css') }}" rel="stylesheet">
	<link href="{{ asset('web/css/icon_fonts/css/all_icons_min.css') }}" rel="stylesheet">
	<link href="{{ asset('web/css/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('web/css/iziToast.min.css') }}" rel="stylesheet">
</head>
<body>
	<div class="layer"></div>
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="{{ route('web.index') }}" title="Nakilcim.com">Nakilcim.com</a></h1>
					</div>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
					<ul id="top_access">
						<li><a href="{{ route('web.login.index') }}"><i class="icon-user-1 fs-1_5"></i></a></li>
						<li><a href="{{ route('web.register.index') }}"><i class="icon-user-add fs-1_5"></i></a></li>
					</ul>
					<div class="main-menu">
						<ul>
							<li><a href="{{ route('web.index') }}">@lang('words.homepage')</a></li>
							<li><a href="{{ route('web.about-us.index') }}">@lang('words.about_us')</a></li>
							<li><a href="{{ route('web.faq.index') }}">@lang('words.faq')</a></li>
							<li><a href="{{ route('web.contact.index') }}">@lang('words.contact')</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>
<main>