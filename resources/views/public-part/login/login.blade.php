@extends('public-part.layout.layout')

@section('content')
<div class="login_wrapper">
    <div class="large_login_wrapper">
        <div class="inner_login_wrapper">
            <h2 class="access_h2">{{ __('Prijavite se na Vaš račun') }}</h2>
        </div>
        <div class="access_login_form">
            <form class="form_1" action="form.php" method="post">
                <p>{{ __('Email') }}</p>
                <input class="style_input" id="inputdefault" type="text" name="email" autocomplete="off"><br><br>
                <p>{{ __('Password') }}</p>
                <input class="style_input" id="inputdefault" type="password" name="password"><br><br>
                <div class="access_form_1">
                    <a class="forgot_pass_question" href="#">{{ __('Zaboravili ste Vaš password?') }}</a>
                    <input class="style_submit" type="submit" value="{{ __('Prijavite se') }}">
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
