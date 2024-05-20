<div class="featured_properties_wrapper">
    <div class="inner_featured_properties_wrapper">
        <div class="featured_properties_text">
            <h1> {{ __('Provjerite naše istaknute ponude!') }} </h1>
            <p> {{ __('Lorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscing') }} </p>
        </div>

        <div class="featured_properties_w">
            <div class="swiper featured_properties">
                <div class="swiper-wrapper">
                    @for($i=1; $i<6; $i++)
                        <div class="swiper-slide">
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
                                                <div class="icon_w icon_w_first">
                                                    <div class="icon_w_explanation">{{ __('Kratki pregled') }}</div>
                                                    <i class="fas fa-expand"></i>
                                                </div>
                                                <div class="icon_w icon_w_second">
                                                    <div class="icon_w_explanation">{{ __('Lista želja') }}</div>
                                                    <i class="fas fa-heart"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text_wrapper">
                                    <a href="{{ route('public-part.properties.preview', ['slug' => 'villa-for-sale']) }}">
                                        <div class="main_text_w">
                                            <h4> @if($i == 1) Ranč-Imanje 40 dunuma i useljiva kuća Bosanska Bojna @elseif($i == 3) Luksuzna kuća sa garažom i vikendicom @else Villa For Sale @endif </h4>
                                            <p> 278 NW 36th St, Miami, FL 33127, USA </p>
                                        </div>
                                    </a>

                                    <div class="text_icons">
                                        <div class="text_icons_icon">
                                            <div class="text_ii_w">
                                                <p>4</p>
                                                <img class="bed" src="{{ asset('files/images/default/bed.png') }}" alt="">
                                            </div>
                                            <div class="text_it_w">
                                                <p>Spavaća soba</p>
                                            </div>
                                        </div>
                                        <div class="text_icons_icon">
                                            <div class="text_ii_w">
                                                <p>2</p>
                                                <img class="shower" src="{{ asset('files/images/default/shwr.png') }}" alt="">
                                            </div>
                                            <div class="text_it_w">
                                                <p>Kupatila</p>
                                            </div>
                                        </div>
                                        <div class="text_icons_icon">
                                            <div class="text_ii_w">
                                                <p>122</p>
                                                <img class="triangle" src="{{ asset('files/images/default/triangle_i.png') }}" alt="">
                                            </div>
                                            <div class="text_it_w">
                                                <p>m <sup>2</sup></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
