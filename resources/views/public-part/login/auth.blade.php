<html>
<head>
    <title> Dobrodošli </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('files/images/default/logo.png') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/c9eb5cb32a.js" crossorigin="anonymous"></script>
    <!-- Include style.scss -->
    @vite(['resources/css/public-part/style.scss', 'resources/js/app.js'])
</head>

<body>
@extends('public-part.layout.layout')
@section('content')
    <div class="auth_wrapper">
        <img class="content_main_img" src="{{ asset('files/images/default/home_front.jpg') }}" alt="">

        <div class="outside_wrapper">
            <div class="large_login_wrapper">
                <div class="inner_login_wrapper">
                    <h2 class="access_h2">{{ __('Prijavite se na Vaš račun') }}</h2>
                </div>
                <div class="access_login_form">
                    <form class="form_1" action="{{ route('public-part.auth.authenticate') }}" method="post">
                        @csrf
                        <p>{{ __('Email') }}</p>
                        <input class="style_input" id="email" type="text" name="email" autocomplete="off"><br><br>
                        <p>{{ __('Password') }}</p>
                        <input class="style_input" id="password" type="password" name="password"><br><br>

                        @if (Session::has('message'))
                            <div class="info-text"> {{ Session::get('message') }} </div>
                        @endif

                        <div class="access_form_1">
                            <a class="forgot_pass_question" href="#">{{ __('Zaboravili ste Vaš password?') }}</a>
                            <input class="style_submit" type="submit" value="{{ __('Prijavite se') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
