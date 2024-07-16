@extends('public-part.layout.layout')

@section('content')
{{--    <div class="content_main">--}}
{{--        <img class="content_main_img" src="{{ asset('files/images/default/home_front.jpg') }}" alt="">--}}
{{--    </div>--}}

    @include('public-part.home.includes.slider')

    <!-- Include filters -->
    @include('public-part.layout.includes.filters')

    <!-- Include widgets -->
    @include('public-part.home.includes.widget')

    <!-- Include featured properties -->
    @include('public-part.home.includes.featured-properties')

    <!-- Include store of properties -->
    @include('public-part.home.includes.store')

    <!-- Include cities -->
    @include('public-part.home.includes.cities')

@endsection
