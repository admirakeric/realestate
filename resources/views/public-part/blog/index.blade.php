@extends('public-part.layout.layout')

@section('content')
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

    <div class="blog_wrapper">
        <div class="blog__all">
            <div class="blog__all__news">
                <div class="blog__inner">
                    <div class="image_blog_wrapper">
                        <img src="{{ asset('files/images/default/sb1.jpg') }}" alt="">
                    </div>
                    <div class="text_blog_wrapper">
                        <h1>Heading</h1>
                        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="icos_blog_wrapper">
                        <div class="icos_blog_wrapper_2">
                            <div class="icons_box_blog_wrapper">
                                <div class="box_1_blog">
                                    <i class="fas fa-calendar-alt"></i>
                                    <p> Prije 1 mjesec </p>
                                </div>
                                <div class="box_1_blog">
                                    <i class="fas fa-pen"></i>
                                    <p>Albin Ćoralić</p>
                                </div>
                            </div>
                            <div class="icons_box_blog_wrapper_2">
                                <div class="button_blog">
                                    Pročitajte više
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="blog__inner">
                    <div class="image_blog_wrapper">
                        <img src="{{ asset('files/images/default/sb1.jpg') }}" alt="">
                    </div>
                    <div class="text_blog_wrapper">
                        <h1>Heading</h1>
                        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="icos_blog_wrapper">
                        <div class="icos_blog_wrapper_2">
                            <div class="icons_box_blog_wrapper">
                                <div class="box_1_blog">
                                    <i class="fas fa-calendar-alt"></i>
                                    <p> Prije 1 mjesec </p>
                                </div>
                                <div class="box_1_blog">
                                    <i class="fas fa-pen"></i>
                                    <p>Albin Ćoralić</p>
                                </div>
                            </div>
                            <div class="icons_box_blog_wrapper_2">
                                <div class="button_blog">
                                    Pročitajte više
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="blog__inner">
                    <div class="image_blog_wrapper">
                        <img src="{{ asset('files/images/default/sb1.jpg') }}" alt="">
                    </div>
                    <div class="text_blog_wrapper">
                        <h1>Heading</h1>
                        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="icos_blog_wrapper">
                        <div class="icos_blog_wrapper_2">
                            <div class="icons_box_blog_wrapper">
                                <div class="box_1_blog">
                                    <i class="fas fa-calendar-alt"></i>
                                    <p> Prije 1 mjesec </p>
                                </div>
                                <div class="box_1_blog">
                                    <i class="fas fa-pen"></i>
                                    <p>Albin Ćoralić</p>
                                </div>
                            </div>
                            <div class="icons_box_blog_wrapper_2">
                                <div class="button_blog">
                                    Pročitajte više
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('public-part.properties.includes.right-side')
        </div>
    </div>


@endsection


