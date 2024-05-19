@extends('public-part.layout.layout')

@section('content')
    <div class="content_main">
        <img class="content_main_img" src="{{ asset('files/images/default/home_front.jpg') }}" alt="">
    </div>

    <!-- Include filters -->
    @include('public-part.layout.includes.filters')

    <!-- Include widgets -->
    @include('public-part.home.includes.widget')

    <!-- Include featured properties -->
    @include('public-part.home.includes.featured-properties')

    <!-- Include about team page -->
{{--    @include('public-part.home.includes.about-team-page')--}}

    <!-- Include store of properties -->
    @include('public-part.home.includes.store')
@endsection
