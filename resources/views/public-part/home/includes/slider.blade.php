<div class="hm-slider">
    <div class="swiper-container" id="home-slider">
        <div class="swiper-wrapper">

            @foreach($slider as $slide)
                <div class="swiper-slide">
                    <img src="{{ isset($slide->desktopImgRel) ? asset( 'files/images/slider/' . $slide->desktopImgRel->name ?? '') : '' }}" alt="" class="desktop-slide-img">
                    <img src="{{ isset($slide->mobileImgRel) ? asset( 'files/images/slider/' . $slide->mobileImgRel->name ?? '') : '' }}" alt="" class="mobile-slide-img">
                    <div class="shadow-element"></div>
                    <div class="slider-text">
                        <h1>{{ $slide->title }}</h1>
                        <!-- <h2>für Ihr Zuhause und Zimmer</h2> -->
                        <h4>{{ $slide->description }}</h4>

                        <div class="button">
                            <a href="">POGLEDAJTE VIŠE</a>
                        </div>
                    </div>
                </div>
            @endforeach
{{--            <div class="swiper-slide">--}}
{{--                <img src="{{ asset('files/images/slider/picture2.jpg') }}" alt="" class="desktop-slide-img">--}}
{{--                <div class="shadow-element"></div>--}}
{{--                <div class="slider-text">--}}
{{--                    <h1>MAKE YOUR LIVE EASIER</h1>--}}
{{--                    <!-- <h2>für Ihr Zuhause und Zimmer</h2> -->--}}
{{--                    <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4>--}}

{{--                    <div class="button">--}}
{{--                        <a href="">POGLEDAJTE VIŠE</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <div class="slider-options">
            <div class="slider-description">
                <div class="swiper-pagination"></div>
                <div class="line"></div>
                <div class="swiper-numbers">
                    <p><span id="current-slide-val">1</span> / <span id="total-slides">0</span></p>
                </div>
            </div>
        </div>
    </div>


{{--    <!-- Initialize Swiper -->--}}
{{--    <script>--}}
{{--        var swiper = new Swiper('#home-slider', {--}}
{{--            autoplay: false,--}}
{{--            speed: 2000,--}}
{{--            pagination: {--}}
{{--                el: '.swiper-pagination',--}}
{{--                clickable: true,--}}
{{--                renderBullet: function (index, className) {--}}
{{--                    return '<span class="' + className + '"></span>';--}}
{{--                },--}}
{{--            },--}}
{{--            on: {--}}
{{--                slideChange: function () {--}}
{{--                    $("#current-slide-val").text(swiper.realIndex = swiper.slides.eq([swiper.activeIndex]).attr('data-swiper-slide-index') || swiper.activeIndex + 1);--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}

{{--        $("#total-slides").text(swiper.slides.length); // Set number of slides--}}
{{--    </script>--}}
</div>
