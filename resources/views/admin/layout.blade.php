<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('layoutAdmin/css/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<script src="{{ asset('layoutAdmin/js/myadmin.js') }}"></script>
	<title>@yield('title')</title>
</head>

<body>
    @include('admin.header')

    @yield('content')

    @include('admin.footer')
		

