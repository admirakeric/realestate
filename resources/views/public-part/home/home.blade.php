@extends('public-part.layout.layout')

@section('content')
    <div class="content_main">
        <img class="content_main_img" src="{{ asset('files/images/default/home_front.jpg') }}" alt="">
    </div>

    <!-- Include filters -->
    @include('public-part.layout.includes.filters')

    <!-- Include widgets -->
    @include('public-part.home.includes.widget')
@endsection
