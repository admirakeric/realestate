@extends('public-part.layout.layout')
@section('other_js') @vite([ 'resources/js/map.js']) @endsection
@section('content')
    <!-- Include filters -->
    @include('public-part.layout.includes.filters')

    {{ html()->hidden('latitude')->id('latitude')->class('form-control')->value($estate->latitude) }}
    {{ html()->hidden('longitude')->id('longitude')->class('form-control')->value($estate->longitude) }}

    <!-- Breadcrumbs -->
    <div class="breadcrumbs_wrapper">
        <div class="breadcrumbs_inner">
            <div class="bi__links">
                <a href="#">
                    <i class="fas fa-home"></i>
                    {{ __('Naslovna') }}
                </a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('public-part.properties') }}">
                    {{ __('Nekretnine') }}
                </a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('public-part.properties.preview', ['slug' => $estate->slug ]) }}"> {{ $estate->title }} </a>
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
                <h1> {{ $estate->title }} </h1>
                <div class="buttons_wrapper">
                    <button class="black_btn">{{ $estate->purposeRel->value ?? '' }}</button>
                </div>
                <div class="address_wrapper">
                    <img src="{{ asset('files/images/default/marker.svg') }}" alt="">
                    <p> {{ $estate->address }}, {{ $estate->cityRel->description ?? '' }} {{ $estate->cityRel->value ?? '' }}, {{ $estate->countryRel->name_ba ?? '' }} </p>
                </div>
            </div>

            <div class="header_right">
                <div class="price_wrapper">
                    <h2> KM {{ $estate->getPrice() }} </h2>
                    <p> KM {{ $estate->pricePerSquareMeter() }} / m <sup>2</sup> </p>
                </div>
            </div>
        </div>
    </div>

    <div class="single__estate">
        <div class="estate_inner_wrapper">
            <div class="estate__property">
                <div class="slider_wrapper">
                    <div class="swiper gallery__swiper">
                        <div class="swiper-wrapper">
                            @foreach($estate->imagesRel as $imageRel)
                                <div class="swiper-slide">
                                    <img src="{{ asset('files/images/estates/' . $imageRel->fileRel->name ?? '') }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <div class="slider_switcher">
                        <div class="slider__switch slider__switch_gallery active" title="{{ __('Galerija fotografija') }}">
                            <i class="fa-regular fa-images"></i>
                        </div>
                        <div class="slider__switch slider__switch_map" title="{{ __('Mapa') }}">
                            <i class="fa-regular fa-map"></i>
                        </div>
                    </div>

                    <div class="map__wrapper" id="map__wrapper"> </div>
                </div>

                <div class="mobile_basic_info">
                    <div class="mobile_icons_wrapper">
                        <div class="miw_w miw_left">
                            <div class="miw_i_w slider__switch_gallery active">
                                <i class="fa-regular fa-images"></i>
                            </div>
                            <div class="miw_i_w slider__switch_map">
                                <i class="fa-regular fa-map"></i>
                            </div>
                        </div>
                        <div class="miw_w miw_right">
                            <div class="miw_i_w">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <div class="miw_i_w">
                                <i class="fas fa-share-nodes"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mobile__text">
                        <div class="buttons_wrapper">
                            <button class="black_btn">{{ $estate->purposeRel->value ?? '' }}</button>
                        </div>

                        <h1> {{ $estate->title }} </h1>
                        <div class="address_wrapper">
                            <img src="{{ asset('files/images/default/marker.svg') }}" alt="">
                            <p> {{ $estate->address }}, {{ $estate->cityRel->description ?? '' }} {{ $estate->cityRel->value ?? '' }}, {{ $estate->countryRel->name_ba ?? '' }} </p>
                        </div>

                        <div class="price_wrapper">
                            <h2> {{ $estate->getPrice() }} KM </h2>
                            <p> {{ $estate->pricePerSquareMeter() }}  KM / m <sup>2</sup> </p>
                        </div>
                    </div>
                </div>

                <div class="estate_element estate_overview">
                    <div class="ee_header">
                        <h4>{{ __('Osnovne informacije') }}</h4>
                        <h5>
                            <b>{{ __('ID Nekretnine') }}:</b>
                            {{ $estate->id }}
                        </h5>
                    </div>

                    <div class="ee_body estate_overview_body">
                        <div class="eob_element">
                            <div class="eob_e_header">
                                <b> {{ $estate->categoryRel->value ?? '' }} </b>
                            </div>
                            <div class="eob_e_body">
                                <p>{{ __('Vrsta nekretnine') }}</p>
                            </div>
                        </div>

                        @if($estate->surface)
                            <div class="eob_element" title="{{ __('Površina nekretnine') }}">
                                <div class="eob_e_header">
                                    <img src="{{ asset('files/images/default/triangle.png') }}" alt="">
                                    <b> {{ $estate->surface }} </b>
                                </div>
                                <div class="eob_e_body">
                                    <p>m <sup>2</sup></p>
                                </div>
                            </div>
                        @endif
                        @if($estate->land_surface)
                            <div class="eob_element" title="{{ __('Površina okućnice / zemljišta') }}">
                                <div class="eob_e_header">
                                    <img src="{{ asset('files/images/default/triangle.png') }}" alt="">
                                    <b> {{ $estate->land_surface }} </b>
                                </div>
                                <div class="eob_e_body">
                                    <p>m <sup>2</sup></p>
                                </div>
                            </div>
                        @endif
                        @if($estate->bedrooms)
                            <div class="eob_element">
                                <div class="eob_e_header">
                                    <img src="{{ asset('files/images/default/bed.png') }}" alt="">
                                    <b> {{ $estate->bedrooms }} </b>
                                </div>
                                <div class="eob_e_body">
                                    <p>{{ __('Spavaćih soba') }}</p>
                                </div>
                            </div>
                        @endif
                        @if($estate->bathrooms)
                            <div class="eob_element">
                                <div class="eob_e_header">
                                    <img src="{{ asset('files/images/default/shower.png') }}" alt="">
                                    <b> {{ $estate->bathrooms }} </b>
                                </div>
                                <div class="eob_e_body">
                                    <p>{{ __('Kupatila') }}</p>
                                </div>
                            </div>
                        @endif
                        @if($estate->garages)
                            <div class="eob_element">
                                <div class="eob_e_header">
                                    <img src="{{ asset('files/images/default/garage.png') }}" alt="">
                                    <b> {{ $estate->garages }} </b>
                                </div>
                                <div class="eob_e_body">
                                    <p>{{ __('Garažnih mjesta') }}</p>
                                </div>
                            </div>
                        @endif
                        @if($estate->built)
                            <div class="eob_element">
                                <div class="eob_e_header">
                                    <img src="{{ asset('files/images/default/calendar.png') }}" alt="">
                                    <b> {{ $estate->built }} </b>
                                </div>
                                <div class="eob_e_body">
                                    <p>{{ __('Godina izgradnje') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="estate_element detailed_description">
                    <div class="ee_header">
                        <h4>{{ __('Detaljan opis nekretnine') }}</h4>
                    </div>

                    <div class="ee_body detailed_description_body"> {!! nl2br($estate->description) !!} </div>
                </div>

                <div class="estate_element dual_elements address">
                    <div class="ee_header">
                        <h4>{{ __('Adresa') }}</h4>
                        <a href="#">
                            <button class="address-btn">
                                <i class="fas fa-map"></i>
                                {{ __('Google mape') }}
                            </button>
                        </a>
                    </div>

                    <div class="ee_body dual_elements_body address_body">
                        <div class="dual_element">
                            <p><b>{{ __('Adresa') }}</b></p>
                            <p>{{ $estate->address }}</p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Poštanski broj') }}</b></p>
                            <p>{{ $estate->cityRel->description ?? '' }}</p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Grad') }}</b></p>
                            <p>{{ $estate->cityRel->value ?? '' }}</p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Država') }}</b></p>
                            <p>{{ $estate->countryRel->name_ba ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Detail info -->
                <div class="estate_element dual_elements address">
                    <div class="ee_header">
                        <h4>{{ __('Detaljne informacije') }}</h4>
                        <p>
                            <i class="fas fa-calendar"></i>
                            {{ __('Ažurirano') }} {{ $estate->updatedAt() }}
                        </p>
                    </div>

                    <div class="ee_body dual_elements_body dual_elements_body_colored ">
                        <div class="dual_element">
                            <p><b>{{ __('ID Nekretnine') }}</b></p>
                            <p>{{ $estate->id }}</p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Vrsta nekretnine') }}</b></p>
                            <p> {{ $estate->categoryRel->value ?? '' }} </p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Cijena') }}</b></p>
                            <p>KM {{ $estate->getPrice() }}</p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Površina') }}</b></p>
                            <p> {{ $estate->surface }} m <sup>2</sup></p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Garaže') }}</b></p>
                            <p>{{ $estate->garages }}</p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Spavaćih soba') }}</b></p>
                            <p> {{ $estate->bedrooms }} </p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Kupatila') }}</b></p>
                            <p> {{ $estate->bathrooms }} </p>
                        </div>
                        <div class="dual_element">
                            <p><b>{{ __('Status') }}</b></p>
                            <p> {{ $estate->purposeRel->value ?? '' }} </p>
                        </div>
                    </div>
                </div>

                <!-- Schedule a tour -->
                <div class="schedule__tour">
                    <div class="schedule_tour_header">
                        <h4>{{ __('Zakažite posjetu') }}</h4>
                    </div>
                    <div class="dates__wrapper">
                        {{ html()->hidden('estate_id')->class('form-control')->value($estate->id) }}

                        <div class="swiper multi-swiper">
                            <div class="swiper-wrapper">
                                @php $i = 0; @endphp
                                @foreach($days as $day)
                                    <div class="swiper-slide">
                                        <div class="inside-swiper visit-date @if(!$i++) active @endif" date="{{ $day->format('Y-m-d') }}">
                                            <p> {{ EstateHelper::weekDay($day->dayOfWeek) }} </p>
                                            <h3>{{ $day->format('d') }}</h3>
                                            <p> {{ EstateHelper::month($day->month) }} </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="inputs__wrapper">
                        {{ html()->select('s_time', $timeArr)->class('')->required()->value('08:00') }}
                        <input type="text" id="s_name" name="s_name" placeholder="{{ __('Vaše ime') }}">
                        <input type="text" id="s_phone" name="s_phone" placeholder="{{ __('Vaš broj telefona') }}" value="+387 ">
                        <input type="text" id="s_email" name="s_email" placeholder="{{ __('Vaš email') }}">
                        <textarea name="s_message" id="s_message" rows="6"></textarea>
                        <button class="schedule-visit">{{ __('Pošaljite zahtjev') }}</button>
                    </div>
                </div>

                @if($estate->video)
                    <!-- Video -->
                    <div class="estate_element video">
                        <div class="ee_header">
                            <h4>{{ __('Video') }}</h4>
                        </div>

                        <div class="ee_body video_body">
                            <iframe src="{{ $estate->video }}" title="{{ $estate->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                @endif

                <div class="estate_element dual_elements contact_us">
                    <div class="ee_header">
                        <h4>{{ __('Kontakt informacije') }}</h4>
                        <a href="#">
                            <button class="contact_us-btn">
                                <i class="fas fa-phone"></i>
                                <span class="main_text">{{ __('Pozovite nas') }}</span>
                                <span class="phone_number"> {{ $agent->phone }} </span>
                            </button>
                        </a>
                    </div>

                    <div class="ee_body dual_elements_body contact_us_body">
                        <div class="agent_info">
                            <div class="img_wrapper">
                                <img src="{{ isset($agent->imageRel) ? asset( 'files/images/users/' . $agent->imageRel->name ?? '') : '' }}" alt="">
                            </div>
                            <div class="text_wrapper">
                                <h4> {{ $agent->name }} </h4>
                                <p> {{ __('Broj licence:') }} {{ $agent->licence }} </p>
                                <div class="contact__info">
                                    <div class="ci__w">
                                        <i class="fas fa-phone"></i>
                                        <p> {{ $agent->phone }} </p>
                                    </div>
                                    <div class="ci__w">
                                        <i class="fas fa-envelope"></i>
                                        <p> {{ $agent->email }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="agent_contact">
                            <div class="ci__w">
                                <i class="fas fa-phone"></i>
                                <p> {{ $agent->phone }} </p>
                            </div>
                            <div class="ci__w">
                                <i class="fas fa-envelope"></i>
                                <p> {{ $agent->email }} </p>
                            </div>
                        </div>

                        <div class="subheader">
                            <h5>{{ __('Želite više informacija?') }}</h5>
                        </div>

                        <div class="contact__form">
                            <div class="input__w">
                                <label for="cf_name">{{ __('Ime i prezime') }}</label>
                                <input type="text" id="cf_name" name="cf_name">
                            </div>
                            <div class="input__w">
                                <label for="cf_phone">{{ __('Broj telefona') }}</label>
                                <input type="text" id="cf_phone" name="cf_phone" value="+387 ">
                            </div>
                            <div class="input__w">
                                <label for="cf_email">{{ __('Email') }}</label>
                                <input type="text" id="cf_email" name="cf_email">
                            </div>
                            <div class="input__w">
                                <label for="cf_what">{{ __('Razlog') }}</label>
                                <select id="cf_what" name="cf_what">
                                    <option value="{{ __('Ja sam kupac') }}"> {{ __('Ja sam kupac') }} </option>
                                    <option value="{{ __('Ja sam agent') }}"> {{ __('Ja sam agent') }} </option>
                                    <option value="{{ __('Drugo') }}"> {{ __('Drugo') }} </option>
                                </select>
                            </div>

                            <div class="input__w input__w_full">
                                <label for="cf_message">{{ __('Vaša poruka') }}</label>
                                <textarea type="text" id="cf_message" name="cf_message"> </textarea>
                            </div>

                            <div class="input__btn_w">
                                <p>
                                    <input type="checkbox" id="cf_agree" name="cf_agree">
                                    <label for="cf_agree">{{ __('Slažem se sa ') }} <a href="#">{{ __('uslovima korištenja.') }}</a></label>
                                </p>
                                <button class="estate-contact-us-btn">{{ __('Zatražite informacije') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Include right side -->
            @include('public-part.properties.includes.right-side')
        </div>
    </div>

@endsection
