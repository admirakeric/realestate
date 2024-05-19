@extends('public-part.layout.layout')

@section('content')
    <!-- Include filters -->
    @include('public-part.layout.includes.filters')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs_wrapper">
        <div class="breadcrumbs_inner">
            <a href="#">
                <i class="fas fa-home"></i>
                {{ __('Naslovna') }}
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#">
                <i class="fas fa-city"></i>
                {{ __('Nekretnine') }}
            </a>
        </div>
    </div>

    <div class="properties__wrapper">
        <div class="properties__inner_w">
            <div class="all_properties">
                @for($i=1; $i<=6; $i++)
                    <div class="single_estate">
                        <div class="image_wrapper">
                            <img src="{{ asset('files/images/estates/estate_' . $i . '.jpg') }}" alt="">
                            <div class="image_cover">
                                <div class="top_buttons">
                                    <div class="top_buttons_w top_left_buttons">
                                        <button class="green_btn">{{ __('IZDVOJENO') }}</button>
                                    </div>
                                    <div class="top_buttons_w top_right_buttons">
                                        @if($i%2 == 0)
                                            <button class="black_btn">{{ __('IZDAJE SE') }}</button>
                                        @else
                                            <button class="black_btn">{{ __('NA PRODAJU') }}</button>
                                        @endif
                                        <button class="red_btn">{{ __('SNIŽENO') }}</button>
                                    </div>
                                </div>

                                <div class="bottom_buttons">
                                    <div class="bottom_buttons_w bottom_buttons_w_left">
                                        <h4> KM 122 000.00 </h4>
                                        <p> KM 1220.00 / m <sup>2</sup> </p>
                                    </div>
                                    <div class="bottom_buttons_w">
                                        <div class="icon_w">
                                            <i class="fas fa-expand"></i>
                                        </div>
                                        <div class="icon_w">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text_wrapper">
                            <div class="main_text_w">
                                <h4> Villa for Sale </h4>
                                <p> 278 NW 36th St, Miami, FL 33127, USA </p>
                            </div>

                            <div class="text_icons">
                                <div class="text_icons_icon">
                                    <div class="text_ii_w">
                                        <p>4</p>
                                        <img src="{{ asset('files/images/default/bed.png') }}" alt="">
                                    </div>
                                    <div class="text_it_w">
                                        <p>Spavaća soba</p>
                                    </div>
                                </div>
                                <div class="text_icons_icon">
                                    <div class="text_ii_w">
                                        <p>2</p>
                                        <img src="{{ asset('files/images/default/shower.png') }}" alt="">
                                    </div>
                                    <div class="text_it_w">
                                        <p>Kupatila</p>
                                    </div>
                                </div>
                                <div class="text_icons_icon">
                                    <div class="text_ii_w">
                                        <p>122</p>
                                        <img src="{{ asset('files/images/default/triangle.png') }}" alt="">
                                    </div>
                                    <div class="text_it_w">
                                        <p>m <sup>2</sup></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="right_side">
                <div class="inner_wrapper">
                    <h4>{{ __('Vrste nekretnina') }}</h4>
                    <div class="first__layer">
                        <a href="#">
                            <i class="fas fa-chevron-right"></i>
                            {{ __('Na prodaju') }}
                        </a>
                        <div class="second__layer">
                            <a href="#">
                                <i class="fas fa-chevron-right"></i>
                                {{ __('Kancelarija') }}
                            </a>
                            <a href="#">
                                <i class="fas fa-chevron-right"></i>
                                {{ __('Kuća') }}
                            </a>
                            <a href="#">
                                <i class="fas fa-chevron-right"></i>
                                {{ __('Stan') }}
                            </a>
                        </div>
                    </div>
                    <div class="first__layer">
                        <a href="#">
                            <i class="fas fa-chevron-right"></i>
                            {{ __('Iznajmljivanje') }}
                        </a>
                        <div class="second__layer">
                            <a href="#">
                                <i class="fas fa-chevron-right"></i>
                                {{ __('Kancelarija') }}
                            </a>
                            <a href="#">
                                <i class="fas fa-chevron-right"></i>
                                {{ __('Kuća') }}
                            </a>
                            <a href="#">
                                <i class="fas fa-chevron-right"></i>
                                {{ __('Stan') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="inner_wrapper">
                    <h4>{{ __('Gradovi') }}</h4>
                    <div class="first__layer first__layer__only">
                        <a href="#">
                            <i class="fas fa-chevron-right"></i>
                            {{ __('Bihać') }}
                        </a>
                        <a href="#">
                            <i class="fas fa-chevron-right"></i>
                            {{ __('Bužim') }}
                        </a>
                        <a href="#">
                            <i class="fas fa-chevron-right"></i>
                            {{ __('Cazin') }}
                        </a>
                        <a href="#">
                            <i class="fas fa-chevron-right"></i>
                            {{ __('V. Kladuša') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection