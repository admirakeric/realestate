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
                <a href="{{ route('public-part.properties') }}">
                    {{ __('Nekretnine') }}
                </a>
            </div>
        </div>
    </div>

    <div class="properties__wrapper">
        <div class="properties__inner_w">
            <div class="all_properties">
                @foreach($estates as $estate)
                    <div class="single_estate">
                        <div class="image_wrapper">
                            <img src="{{ isset($estate->mainImageRel) ? asset( 'files/images/estates/' . $estate->mainImageRel->name ?? '') : '' }}" alt="">
                            <div class="image_cover">
                                <div class="top_buttons">
                                    <div class="top_buttons_w top_left_buttons">
                                        <button class="green_btn">{{ __('IZDVOJENO') }}</button>
                                    </div>
                                    <div class="top_buttons_w top_right_buttons">
                                        <button class="black_btn">{{ $estate->purposeRel->value ?? '' }}</button>
                                        @if($estate->sale_price)
                                            <button class="red_btn">{{ __('SNIŽENO') }}</button>
                                        @endif
                                    </div>
                                </div>

                                <div class="bottom_buttons">
                                    <div class="bottom_buttons_w bottom_buttons_w_left">
                                        <h4> KM {{ $estate->getPrice() }} </h4>
                                        <p> KM {{ $estate->sq_m_price }} / m <sup>2</sup> </p>
                                    </div>
                                    <div class="bottom_buttons_w">
                                        <div class="icon_w icon_w_first">
                                            <div class="icon_w_explanation">{{ __('Kratki pregled') }}</div>
                                            <i class="fas fa-expand"></i>
                                        </div>
                                        <div class="icon_w icon_w_second add-to-wishlist" estate-id="{{ $estate->id }}">
                                            <div class="icon_w_explanation">{{ __('Lista želja') }}</div>
                                            @if($estate->inWishList())
                                                <i class="fas fa-heart wishlist-heart"></i>
                                            @else
                                                <i class="fa-regular fa-heart wishlist-heart"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text_wrapper">
                            <a href="{{ route('public-part.properties.preview', ['slug' => $estate->slug ]) }}">
                                <div class="main_text_w">
                                    <h4> {{ $estate->title }} </h4>
                                    <p> {{ $estate->address }}, {{ $estate->cityRel->description ?? '' }} {{ $estate->cityRel->value ?? '' }}, {{ $estate->countryRel->name_ba ?? '' }} </p>
                                </div>
                            </a>

                            <div class="text_icons">
                                @if($estate->bedrooms)
                                    <div class="text_icons_icon">
                                        <div class="text_ii_w">
                                            <p>{{ $estate->bedrooms }}</p>
                                            <img src="{{ asset('files/images/default/bed.png') }}" alt="">
                                        </div>
                                        <div class="text_it_w">
                                            <p>Spavaća soba</p>
                                        </div>
                                    </div>
                                @endif
                                @if($estate->bathrooms)
                                    <div class="text_icons_icon">
                                        <div class="text_ii_w">
                                            <p>{{ $estate->bathrooms }}</p>
                                            <img src="{{ asset('files/images/default/shwr.png') }}" alt="">
                                        </div>
                                        <div class="text_it_w">
                                            <p>Kupatila</p>
                                        </div>
                                    </div>
                                @endif
                                @if($estate->surface)
                                    <div class="text_icons_icon" title="{{ __('Površina nekretnine') }}">
                                        <div class="text_ii_w">
                                            <p>{{ $estate->surface }}</p>
                                            <img src="{{ asset('files/images/default/triangle_i.png') }}" alt="">
                                        </div>
                                        <div class="text_it_w">
                                            <p>m <sup>2</sup></p>
                                        </div>
                                    </div>
                                @endif
                                @if($estate->land_surface)
                                    <div class="text_icons_icon" title="{{ __('Površina okućnice / zemljišta') }}">
                                        <div class="text_ii_w">
                                            <p>{{ $estate->land_surface }}</p>
                                            <img src="{{ asset('files/images/default/triangle_i.png') }}" alt="">
                                        </div>
                                        <div class="text_it_w">
                                            <p>m <sup>2</sup></p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination__wrapper">
                    {{$estates->links("pagination::bootstrap-4")}}
                </div>


{{--                <div class="pagination__wrapper">--}}
{{--                    @for($i=1; $i<=$estates->lastPage(); $i++)--}}
{{--                        <a href="#">--}}
{{--                            <div class="page-w"> <p>{{ $i }}</p> </div>--}}
{{--                        </a>--}}
{{--                    @endfor--}}
{{--                </div>--}}
            </div>

            <!-- Include right side -->
            @include('public-part.properties.includes.right-side')
        </div>
    </div>
@endsection
