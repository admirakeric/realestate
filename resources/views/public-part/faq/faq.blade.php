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
            @foreach($faqs as $faq)
                <div class="header_faq">
                    <h1>{{ $faq->value }}</h1>
                </div>
                <div class="inner_faq_wrapper">
                    <div class="inner_inner_faq_wrapper">
                        @foreach($faq->faqsRel as $question)
                            <div class="inner_inner_faq_wrapper__in">
                                <div class="inner_heading_faq_wrapper">
                                    <i class="fas fa-chevron-down"></i>
                                    <h3>{{ $question->question }}</h3>
                                </div>
                                <div class="inner_description_faq_wrapper">
                                    <p> {{ $question->answer }} </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
