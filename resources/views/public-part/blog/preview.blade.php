@extends('public-part.layout.layout')

@section('title'){{ $post->title }}@endsection
@section('meta_uri'){{ route('public-part.blog.preview', ['slug' => $post->slug]) }}}@endsection
@section('meta_title'){{ $estate->title }}@endsection
@section('meta_desc'){{ $estate->short_desc }}@endsection
@section('meta_img'){{ isset($post->imageRel) ? asset( 'files/images/blog/' . $post->imageRel->name ?? '') : '' }}@endsection

@section('content')
    <!-- Include filters -->
    @include('public-part.layout.includes.blog-filters')

    <div class="breadcrumbs_wrapper">
        <div class="breadcrumbs_inner">
            <div class="bi__links">
                <a href="{{ route('public-part.home') }}">
                    <i class="fas fa-home"></i>
                    {{ __('Naslovna') }}
                </a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('public-part.blog.index') }}">
                    {{ __('Blog sekcija') }}
                </a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('public-part.blog.preview', ['slug' => $post->slug]) }}">
                    {{ $post->title }}
                </a>
            </div>
        </div>
    </div>

    <div class="blog_wrapper">
        <div class="blog__all">
            <div class="blog__preview">
                <div class="blog__header">
                    <h1>{{ $post->title }}</h1>
                    <div class="icons__wrapper">
                        <div class="single__icon">
                            <i class="fas fa-calendar-alt"></i>
                            <p> {{ $post->createdAt() }} </p>
                        </div>
                        <a href="{{ route('public-part.blog.search-by-category', ['category' => $post->category ]) }}">
                            <div class="single__icon">
                                <i class="fas fa-tag"></i>
                                <p> {{ $post->categoryRel->value ?? '' }} </p>
                            </div>
                        </a>
                        <div class="single__icon created_by">
                            <i class="fas fa-pen"></i>
                            <p>{{ $post->createdByRel->name ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="blog__img__wrapper">
                    <img src="{{ isset($post->imageRel) ? asset( 'files/images/blog/' . $post->imageRel->name ?? '') : '' }}" alt="">
                </div>
                <div class="blog__content">
                    {!! nl2br($post->content) !!}
                </div>
            </div>

            @include('public-part.blog.includes.right-side')
        </div>
    </div>


@endsection


