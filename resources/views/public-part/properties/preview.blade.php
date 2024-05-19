@extends('public-part.layout.layout')

@section('content')
    <!-- Include filters -->
    @include('public-part.layout.includes.filters')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs_wrapper">
        <div class="breadcrumbs_inner">
            <div class="bi__links">
                <a href="#">
                    <i class="fas fa-home"></i>
                    {{ __('Naslovna') }}
                </a>
                <i class="fas fa-chevron-right"></i>
                <a href="#">
                    {{ __('Nekretnine') }}
                </a>
                <i class="fas fa-chevron-right"></i>
                <a href="#">
                    {{ __('Villa for Sale') }}
                </a>
            </div>
            <div class="bi_icons">
                <div class="bi_icon_wrapper">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="bi_icon_wrapper">
                    <i class="fas fa-share-nodes"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="single_estate_header">
        <div class="single_estate_header_inner">
            <div class="header_left">
                <h1> Villa for Sale </h1>
                <div class="buttons_wrapper">
                    <button class="black_btn">{{ __('IZDAJE SE') }}</button>
                </div>
                <div class="address_wrapper">
                    <img src="{{ asset('files/images/default/marker.svg') }}" alt="">
                    <p>3385 Pan American Dr, Miami, FL 33133, USA</p>
                </div>
            </div>

            <div class="header_right">
                <div class="price_wrapper">
                    <h2> KM 122 000.00 </h2>
                    <p> KM 1220.00 / m <sup>2</sup> </p>
                </div>
            </div>
        </div>
    </div>

    <div class="single__estate">
        <div class="estate_inner_wrapper">
            <div class="estate__property">
                <div class="slider_wrapper">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @for($i=1; $i<6; $i++)
                                <div class="swiper-slide">
                                    <img src="{{ asset('files/images/estates/e' . $i . '.jpg') }}" alt="">
                                </div>
                            @endfor
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="estate_element estate_overview">
                    <div class="ee_header">
                        <h4>{{ __('Osnovne informacije') }}</h4>
                        <h5>
                            <b>{{ __('ID Nekretnine') }}:</b>
                            EK232
                        </h5>
                    </div>

                    <div class="ee_body estate_overview_body">
                        <div class="eob_element">
                            <div class="eob_e_header">
                                <b> Villa </b>
                            </div>
                            <div class="eob_e_body">
                                <p>{{ __('Vrsta nekretnine') }}</p>
                            </div>
                        </div>

                        <div class="eob_element">
                            <div class="eob_e_header">
                                <img src="{{ asset('files/images/default/bed.png') }}" alt="">
                                <b> 4 </b>
                            </div>
                            <div class="eob_e_body">
                                <p>{{ __('Spavaćih soba') }}</p>
                            </div>
                        </div>

                        <div class="eob_element">
                            <div class="eob_e_header">
                                <img src="{{ asset('files/images/default/shower.png') }}" alt="">
                                <b> 2 </b>
                            </div>
                            <div class="eob_e_body">
                                <p>{{ __('Kupatila') }}</p>
                            </div>
                        </div>

                        <div class="eob_element">
                            <div class="eob_e_header">
                                <img src="{{ asset('files/images/default/triangle.png') }}" alt="">
                                <b> 122 </b>
                            </div>
                            <div class="eob_e_body">
                                <p>m <sup>2</sup></p>
                            </div>
                        </div>
                        <div class="eob_element">
                            <div class="eob_e_header">
                                <img src="{{ asset('files/images/default/triangle.png') }}" alt="">
                                <b> 122 </b>
                            </div>
                            <div class="eob_e_body">
                                <p>m <sup>2</sup></p>
                            </div>
                        </div>
                        <div class="eob_element">
                            <div class="eob_e_header">
                                <img src="{{ asset('files/images/default/calendar.png') }}" alt="">
                                <b> 2000+ </b>
                            </div>
                            <div class="eob_e_body">
                                <p>{{ __('Godina izgradnje') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="estate_element detailed_description">
                    <div class="ee_header">
                        <h4>{{ __('Detaljan opis nekretnine') }}</h4>
                    </div>

                    <div class="ee_body detailed_description_body">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                        <br><br>
                        <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                    </div>
                </div>
            </div>
            <!-- Include right side -->
            @include('public-part.properties.includes.right-side')
        </div>
    </div>

    <br><br><br>    <br><br><br>    <br><br><br>    <br><br><br>    <br><br><br>    <br><br><br>    <br><br><br>    <br><br><br>    <br><br><br>    <br><br><br>
@endsection
