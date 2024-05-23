@extends('public-part.layout.layout')

@section('content')

    <div class="cover__image">
        <img src="{{ asset('files/images/default/cover_photo.jpg') }}" alt="">
        <div class="shadow">
            <div class="inner_wrapper">
                <h1>{{ __('Često postavljana pitanja') }}</h1>
            </div>
        </div>
    </div>

    <div class="faq_wrapper">
        <div class="faq_wrapper_sub">
            <div class="header_faq">
                <h1>{{ __('Kategorija 1') }}</h1>
            </div>
            <div class="inner_faq_wrapper">
                <div class="inner_inner_faq_wrapper">
                    @for($i=0; $i<6; $i++)
                        <div class="inner_inner_faq_wrapper__in">
                            <div class="inner_heading_faq_wrapper">
                                <i class="fas fa-chevron-down"></i>
                                <h3>{{ __('Naziv pitanja broja 1') }}</h3>
                            </div>
                            <div class="inner_description_faq_wrapper">
                                <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Quisque aliquet massa mi, sed ornare dui ullamcorper non.
                            Pellentesque habitant morbi tristique senectus et netus et malesuada
                            fames ac turpis egestas. Duis nec orci ac lorem tempor ultricies.
                            Pellentesque pulvinar nisl pulvinar ex tincidunt, eu gravida lacus auctor.
                            Maecenas finibus eros pharetra, tempus tortor sit amet, faucibus sapien.
                            Donec non nulla posuere, malesuada urna quis, ornare lectus.
                            Nunc gravida, sapien non laoreet consectetur, sem
                            ligula consequat ex, sit amet sodales velit dui a ipsum.
                            Mauris aliquet metus nec dui porttitor, non mattis ex accumsan.
                            Duis gravida diam est, ac molestie erat porta sit amet.
                            Vivamus tortor mauris, aliquet condimentum elit porttitor,
                            consequat malesuada nibh. Duis nec vestibulum nisi, eget dignissim ex') }}</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="header_faq">
                <h1>{{ __('Kategorija 2') }}</h1>
            </div>

            <div class="inner_faq_wrapper">
                <div class="inner_inner_faq_wrapper">
                    @for($i=0; $i<6; $i++)
                        <div class="inner_inner_faq_wrapper__in">
                            <div class="inner_heading_faq_wrapper">
                                <i class="fas fa-chevron-down"></i>
                                <h3>{{ __('Naziv pitanja broja 1') }}</h3>
                            </div>
                            <div class="inner_description_faq_wrapper">
                                <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Quisque aliquet massa mi, sed ornare dui ullamcorper non.
                            Pellentesque habitant morbi tristique senectus et netus et malesuada
                            fames ac turpis egestas. Duis nec orci ac lorem tempor ultricies.
                            Pellentesque pulvinar nisl pulvinar ex tincidunt, eu gravida lacus auctor.
                            Maecenas finibus eros pharetra, tempus tortor sit amet, faucibus sapien.
                            Donec non nulla posuere, malesuada urna quis, ornare lectus.
                            Nunc gravida, sapien non laoreet consectetur, sem
                            ligula consequat ex, sit amet sodales velit dui a ipsum.
                            Mauris aliquet metus nec dui porttitor, non mattis ex accumsan.
                            Duis gravida diam est, ac molestie erat porta sit amet.
                            Vivamus tortor mauris, aliquet condimentum elit porttitor,
                            consequat malesuada nibh. Duis nec vestibulum nisi, eget dignissim ex') }}</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

@endsection
