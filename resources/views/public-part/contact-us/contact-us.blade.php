@extends('public-part.layout.layout')

@section('content')
    <div class="cover__image">
        <div class="shadow">
            <div class="inner_wrapper">
                <h1>{{ __('Kontaktirajte nas') }}</h1>
            </div>
        </div>
    </div>

    <div class="contact_us_wrapper">
        <div class="contact_us_inner_wrapper">
            <div class="cu_i_w_form">
                <div class="cu_i_w_left">
{{--                            <div class="subheader">--}}
{{--                                <h5>{{ __('Imate pitanje? Ispunite formu i pošaljite Vaš upit.') }}</h5>--}}
{{--                            </div>--}}

{{--                            <div class="contact__form">--}}
{{--                                <div class="input__w">--}}
{{--                                    <label for="cf_name">{{ __('Ime i prezime') }}</label>--}}
{{--                                    <input type="text" id="cf_name" name="cf_name">--}}
{{--                                </div>--}}
{{--                                <div class="input__w">--}}
{{--                                    <label for="cf_phone">{{ __('Broj telefona') }}</label>--}}
{{--                                    <input type="text" id="cf_phone" name="cf_phone" value="+387 ">--}}
{{--                                </div>--}}
{{--                                <div class="input__w">--}}
{{--                                    <label for="cf_email">{{ __('Email') }}</label>--}}
{{--                                    <input type="text" id="cf_email" name="cf_email">--}}
{{--                                </div>--}}
{{--                                <div class="input__w input__w_full">--}}
{{--                                    <label for="cf_message">{{ __('Vaša poruka') }}</label>--}}
{{--                                    <textarea type="text" id="cf_message" name="cf_message"> </textarea>--}}
{{--                                </div>--}}

{{--                                <div class="input__btn_w">--}}
{{--                                    <p>--}}
{{--                                        <input type="checkbox" id="cf_agree" name="cf_agree">--}}
{{--                                        <label for="cf_agree">{{ __('Slažem se sa ') }} <a href="#">{{ __('uslovima korištenja.') }}</a></label>--}}
{{--                                    </p>--}}
{{--                                    <button>{{ __('Zatražite informacije') }}</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                </div>
                <div class="cu_i_w_right">
ddd
                </div>
            </div>

            <div class="cu_i_w_map">

            </div>
        </div>
    </div>
@endsection
