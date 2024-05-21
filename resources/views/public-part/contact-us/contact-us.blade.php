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
                    <div class="cu_i_w_left_subheader">
                        <h5>{{ __('Imate pitanje? Ispunite upit i pošaljite nam poruku!') }}</h5>
                    </div>

                    <div class="cu_i_w_left_contact__form">
                        <div class="left_input__w">
                            <label for="cf_fname">{{ __('Ime') }}</label>
                            <input type="text" id="cf_name" name="cf_name">
                        </div>
                        <div class="left_input__w">
                            <label for="cf_lname">{{ __('Prezime') }}</label>
                            <input type="text" id="cf_lname" name="cf_lname">
                        </div>
                        <div class="left_input__w">
                            <label for="cf_email">{{ __('Email') }}</label>
                            <input type="text" id="cf_email" name="cf_email">
                        </div>

                        <div class="left_input__w input__w_full">
                            <label for="cf_message">{{ __('Vaša poruka') }}</label>
                            <textarea type="text" id="cf_message" name="cf_message"> </textarea>
                        </div>

                        <div class="left_input__btn_w">
                            <p>
                                <input type="checkbox" id="cf_agree" name="cf_agree">
                                <label for="cf_agree">{{ __('Slažem se sa ') }} <a href="#">{{ __('uslovima korištenja.') }}</a></label>
                            </p>
                            <button>{{ __('Zatražite informacije') }}</button>
                        </div>
                    </div>
                </div>
                <div class="cu_i_w_right">
                    <div class="cu_i_w_right_one">
                        <div class="cu_i_w_right_one_1">
                            <h6>{{ __('Za upite kontaktirajte: ') }}</h6>
                        </div>
                        <div class="cu_i_w_right_one_2">
                            <div class="cu_i_w_right_one_2_1">
                                <h6>{{ __('Name') }}</h6>
                                <p>{{ __('Position') }}</p>
                                <p>{{ __('Address') }}</p>
                                <p>{{ __('Email') }}</p>
                            </div>
                            <div class="cu_i_w_right_one_2_2">
                                <h6>{{ __('Name') }}</h6>
                                <p>{{ __('Position') }}</p>
                                <p>{{ __('Address') }}</p>
                                <p>{{ __('Email') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="cu_i_w_right_two">
                        <div class="cu_i_w_right_two_1">
                            <h6>{{ __('Company Name') }}</h6>
                            <p>{{ __('Company Address') }}</p>
                            <p>{{ __('City, State') }}</p>
                        </div>
                    </div>
                    <div class="cu_i_w_right_three">
                        <div class="cu_i_w_right_three_inner">
                            <div class="cu_i_w_right_three_fb">
                                <a href="#">
                                    <img src="{{ asset('files/images/default/ig.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_yt">
                                <a href="#">
                                    <img src="{{ asset('files/images/default/ig.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_in">
                                <a href="#">
                                    <img src="{{ asset('files/images/default/ig.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cu_i_w_map">

            </div>
        </div>
    </div>
@endsection
