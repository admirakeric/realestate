@extends('public-part.layout.layout')

@section('content')

<div class="single__page_wrapper">
    <div class="single__page__inner">
        @isset($page->imageRel)
            <div class="image__wrapper">
                <img src="{{ isset($page->imageRel) ? asset( 'files/images/pages/' . $page->imageRel->name ?? '') : '' }}" alt="">
            </div>
        @endisset

        <div class="text__wrapper">
{{--            <h1>{{ $page->title }}</h1>--}}
            <p> {!! nl2br($page->description) !!} </p>
        </div>
    </div>
</div>

@endsection
