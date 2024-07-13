@extends('public-part.layout.layout')

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
            </div>
        </div>
    </div>

    <div class="blog_wrapper">
        <div class="blog__all">
            <div class="blog__all__news">
                @foreach($posts as $post)
                    <div class="blog__inner">
                        <div class="image_blog_wrapper">
                            <img src="{{ isset($post->imageRel) ? asset( 'files/images/blog/' . $post->imageRel->name ?? '') : '' }}" alt="">
                        </div>
                        <div class="text_blog_wrapper">
                            <h1> {{ $post->title }} </h1>
                            <p> {{ $post->short_desc }} </p>
                        </div>
                        <div class="icos_blog_wrapper">
                            <div class="icos_blog_wrapper_2">
                                <div class="icons_box_blog_wrapper">
                                    <div class="box_1_blog">
                                        <i class="fas fa-calendar-alt"></i>
                                        <p> {{ $post->createdAt() }} </p>
                                    </div>
                                    <div class="box_1_blog">
                                        <i class="fas fa-pen"></i>
                                        <p>{{ $post->createdByRel->name ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="icons_box_blog_wrapper_2">
                                    <a href="{{ route('public-part.blog.preview', ['slug' => $post->slug]) }}">
                                        <div class="button_blog">
                                            {{ __('Pročitajte više') }}
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                    <div class="pagination__wrapper">
                        {{$posts->links("pagination::bootstrap-4")}}
                    </div>
            </div>

            @include('public-part.blog.includes.right-side')
        </div>
    </div>


@endsection


