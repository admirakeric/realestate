@extends('public-part.layout.layout')
@section('other_js') @vite([ 'resources/js/map.js']) @endsection
@section('content')
    {{ html()->hidden('latitude')->id('latitude')->class('form-control')->value("44.9654537") }}
    {{ html()->hidden('longitude')->id('longitude')->class('form-control')->value("15.9206849") }}

    <div class="cover__image">
        <img src="{{ asset('files/images/default/cover_photo.jpg') }}" alt="">
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
                        <h3>{{ __('Imate pitanje? Ispunite formu i pošaljite nam poruku!') }}</h3>
                    </div>

                    <div class="cu_i_w_left_contact__form">
                        <div class="left_input__w">
                            <label for="cf_fname">{{ __('Ime i prezime') }}</label>
                            <input type="text" id="cf_name" name="cf_name">
                        </div>
                        <div class="left_input__w">
                            <label for="cf_phone">{{ __('Broj telefona') }}</label>
                            <input type="text" id="cf_phone" name="cf_phone" value="+387 ">
                        </div>
                        <div class="left_input__w input__w_full">
                            <label for="cf_email">{{ __('Email') }}</label>
                            <input type="text" id="cf_email" name="cf_email">
                        </div>

                        <div class="left_input__w input__w_full">
                            <label for="cf_message">{{ __('Vaša poruka') }}</label>
                            <textarea type="text" id="cf_message" name="cf_message" maxlength="500"> </textarea>
                        </div>

                        <div class="left_input__btn_w">
                            <p>
                                <input type="checkbox" id="cf_agree" name="cf_agree">
                                <label for="cf_agree">{{ __('Slažem se sa ') }} <a href="{{ route('public-part.pages.terms-and-conditions') }}" target="_blank">{{ __('uslovima korištenja.') }}</a></label>
                            </p>
                            <button class="send_us_message" attr="contact-form">{{ __('Pošaljte nam poruku') }}</button>
                        </div>
                    </div>
                </div>
                <div class="cu_i_w_right">
                    <div class="cu_i_w_right_one">
                        <div class="cu_i_w_right_one_1">
                            <h6>{{ __('Za upite kontaktirajte: ') }}</h6>
                        </div>
                        <div class="cu_i_w_right_one_2">
                            @foreach($users as $user)
                                <div class="cu_i_w_right_one_2_1">
                                    <h6>{{ $user->name }}</h6>
                                    <p>{{ $user->licence }}</p>
                                    <p>{{ $user->phone }}</p>
                                    <p>{{ $user->email }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="cu_i_w_right_two">
                        <div class="cu_i_w_right_two_1">
                            <h6>{{ __('Euro-Plac d.o.o Cazin') }}</h6>
                            <p>{{ __('Ćuprija bb') }}</p>
                            <p>{{ __('77220 Cazin, BiH') }}</p>
                        </div>
                    </div>
                    <div class="cu_i_w_right_three">
                        <div class="cu_i_w_right_three_inner">
                            <div class="cu_i_w_right_three_fb">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M22 12.9356C22 7.37902 17.5229 2.87451 12 2.87451C6.47715 2.87451 2 7.37902 2 12.9356C2 17.9573 5.65684 22.1197 10.4375 22.8745V15.8439H7.89844V12.9356H10.4375V10.719C10.4375 8.19747 11.9305 6.80463 14.2146 6.80463C15.3088 6.80463 16.4531 7.00114 16.4531 7.00114V9.47712H15.1922C13.95 9.47712 13.5625 10.2527 13.5625 11.0484V12.9356H16.3359L15.8926 15.8439H13.5625V22.8745C18.3432 22.1197 22 17.9575 22 12.9356Z" fill="#333333"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_yt">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 3.87451H8C5.23858 3.87451 3 6.11309 3 8.87451V16.8745C3 19.6359 5.23858 21.8745 8 21.8745H16C18.7614 21.8745 21 19.6359 21 16.8745V8.87451C21 6.11309 18.7614 3.87451 16 3.87451ZM19.25 16.8745C19.2445 18.6671 17.7926 20.119 16 20.1245H8C6.20735 20.119 4.75549 18.6671 4.75 16.8745V8.87451C4.75549 7.08186 6.20735 5.63 8 5.62451H16C17.7926 5.63 19.2445 7.08186 19.25 8.87451V16.8745ZM16.75 9.12451C17.3023 9.12451 17.75 8.67679 17.75 8.12451C17.75 7.57223 17.3023 7.12451 16.75 7.12451C16.1977 7.12451 15.75 7.57223 15.75 8.12451C15.75 8.67679 16.1977 9.12451 16.75 9.12451ZM12 8.37451C9.51472 8.37451 7.5 10.3892 7.5 12.8745C7.5 15.3598 9.51472 17.3745 12 17.3745C14.4853 17.3745 16.5 15.3598 16.5 12.8745C16.5027 11.6802 16.0294 10.5341 15.1849 9.68959C14.3404 8.8451 13.1943 8.37185 12 8.37451ZM9.25 12.8745C9.25 14.3933 10.4812 15.6245 12 15.6245C13.5188 15.6245 14.75 14.3933 14.75 12.8745C14.75 11.3557 13.5188 10.1245 12 10.1245C10.4812 10.1245 9.25 11.3557 9.25 12.8745Z" fill="#333333"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_in">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M21.5933 7.83484C21.4794 7.41225 21.2568 7.02685 20.9477 6.71701C20.6386 6.40717 20.2537 6.1837 19.8313 6.06884C18.2653 5.63884 12.0003 5.63184 12.0003 5.63184C12.0003 5.63184 5.73633 5.62484 4.16933 6.03584C3.74725 6.15599 3.36315 6.38262 3.0539 6.69398C2.74464 7.00534 2.52062 7.39096 2.40333 7.81384C1.99033 9.37984 1.98633 12.6278 1.98633 12.6278C1.98633 12.6278 1.98233 15.8918 2.39233 17.4418C2.62233 18.2988 3.29733 18.9758 4.15533 19.2068C5.73733 19.6368 11.9853 19.6438 11.9853 19.6438C11.9853 19.6438 18.2503 19.6508 19.8163 19.2408C20.2388 19.1262 20.6241 18.9032 20.934 18.594C21.2439 18.2848 21.4677 17.9001 21.5833 17.4778C21.9973 15.9128 22.0003 12.6658 22.0003 12.6658C22.0003 12.6658 22.0203 9.40084 21.5933 7.83484ZM9.99633 15.6368L10.0013 9.63684L15.2083 12.6418L9.99633 15.6368Z" fill="#333333"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_in">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
                                        <path d="M17.1761 0.242188H19.9362L13.9061 7.01959L21 16.2422H15.4456L11.0951 10.6488L6.11723 16.2422H3.35544L9.80517 8.99299L3 0.242188H8.69545L12.6279 5.35481L17.1761 0.242188ZM16.2073 14.6176H17.7368L7.86441 1.78147H6.2232L16.2073 14.6176Z" fill="#333333"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_in">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 -0.757812C3.67157 -0.757812 3 -0.0862425 3 0.742188V15.7422C3 16.5706 3.67157 17.2422 4.5 17.2422H19.5C20.3284 17.2422 21 16.5706 21 15.7422V0.742188C21 -0.0862425 20.3284 -0.757812 19.5 -0.757812H4.5ZM8.52076 3.24491C8.52639 4.20116 7.81061 4.79038 6.96123 4.78616C6.16107 4.78194 5.46357 4.14491 5.46779 3.24632C5.47201 2.40116 6.13998 1.72194 7.00764 1.74163C7.88795 1.76132 8.52639 2.40679 8.52076 3.24491ZM12.2797 6.00395H9.75971H9.7583V14.5638H12.4217V14.3641C12.4217 13.9842 12.4214 13.6042 12.4211 13.2241C12.4203 12.2103 12.4194 11.1954 12.4246 10.1819C12.426 9.93579 12.4372 9.67989 12.5005 9.44499C12.7381 8.56749 13.5271 8.00079 14.4074 8.14009C14.9727 8.22859 15.3467 8.55629 15.5042 9.08929C15.6013 9.42249 15.6449 9.78109 15.6491 10.1285C15.6605 11.1761 15.6589 12.2237 15.6573 13.2714C15.6567 13.6412 15.6561 14.0112 15.6561 14.381V14.5624H18.328V14.3571C18.328 13.9051 18.3278 13.4532 18.3275 13.0013C18.327 11.8718 18.3264 10.7423 18.3294 9.61239C18.3308 9.10189 18.276 8.59849 18.1508 8.10489C17.9638 7.37079 17.5771 6.76329 16.9485 6.32459C16.5027 6.01238 16.0133 5.81129 15.4663 5.78879C15.404 5.7862 15.3412 5.78281 15.2781 5.7794C14.9984 5.76428 14.7141 5.74892 14.4467 5.80285C13.6817 5.95613 13.0096 6.30629 12.5019 6.92359C12.4429 6.99439 12.3852 7.06629 12.2991 7.17359L12.2797 7.19789V6.00395ZM5.68164 14.5666H8.33242V6.00952H5.68164V14.5666Z" fill="#333333"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cu_i_w_map" id="map__wrapper">

            </div>
        </div>
    </div>
@endsection
