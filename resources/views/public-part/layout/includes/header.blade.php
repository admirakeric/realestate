<header>
    <div class="inner_wrapper">
        <div class="main_header">
            <div class="company-logo">
                <a href="{{ route('public-part.home') }}">
                    <img src="{{ asset('files/images/default/logo.png') }}" alt="">
                </a>
            </div>
            <div class="main_header_right">
                <div class="other-header-info">
                    <div class="icons-info">
                        <div class="icons">
                            <img src="{{ asset('files/images/default/phone_call.png') }}" alt="">
                        </div>
                        <div class="other-infos">
                            <p class="p-bold">
                                {{ __('+387 61 786 860') }} <br> {{ __('+387 63 786 416') }}
                            </p>
                            <p class="p-thin">
                                {{ __('europlac-nekretnine@hotmail.com') }}
                            </p>
                        </div>
                    </div>
                    <div class="icons-info">
                        <div class="icons">
                            <img src="{{ asset('files/images/default/location.png') }}" alt="">
                        </div>
                        <div class="other-infos">
                            <p class="p-bold">
                                {{ __('Ćuprija bb') }} <br> {{ __('Generala Izeta Nanića') }}
                            </p>
                            <p class="p-thin">
                                {{ __('Cazin 77220') }}
                            </p>
                        </div>
                    </div>
                    <div class="icons-info">
                        <div class="icons">
                            <img src="{{ asset('files/images/default/clock.png') }}" alt="">
                        </div>
                        <div class="other-infos">
                            <p class="p-bold">
                                {{ __('08:00 - 16:30') }}
                            </p>
                            <p class="p-thin">
                                {{ __('Ponedjeljak - Subota') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="social-net-icons">
                    <ul class="icon-list">
                        <li>
                            <a target="_blank" class="btn-icon-sm" href="https://www.facebook.com/europlac.nekretnine/">
                                <img src="{{ asset('files/images/default/fb.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn-icon-sm" href="https://www.instagram.com/europlac_cazin/">
                                <img src="{{ asset('files/images/default/in.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn-icon-sm" href="https://www.youtube.com/@euro-placcazin">
                                <img src="{{ asset('files/images/default/yt.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn-icon-sm" href="{{ route('public.part.contact-us') }}">
                                <img src="{{ asset('files/images/default/yelp.png') }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="main_menu">
        <div class="main_menu_inner">
            <div class="mail-menu-nav">
                <nav class="blue-menu">
                    <ul>
                        <li class="li_menu">
                            <a class="menu" href="{{ route('public-part.pages.about-us') }}"> {{ __('O nama') }} </a>
                        </li>
                        <li class="li_menu">
                            <a class="menu" href="#">
                                {{ __('Nekretnine') }}
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="li_menu_submenu">
                                @foreach($categories as $key => $category)
                                    <div class="li_m_s_w">
                                        <a href="{{ route('public-part.properties') }}?category={{ $key }}"> {{ $category }}</a>
                                    </div>
                                @endforeach
                                <div class="li_m_s_w">
                                    <a href="{{ route('public-part.properties') }}?category=wishlist"> {{ __('Lista želja') }}</a>
                                </div>
                            </div>
                        </li>
                        <li class="li_menu">
                            <a class="menu" href="{{ route('public-part.blog.index') }}"> {{ __('Blog sekcija') }} </a>
                        </li>
                        <li class="li_menu">
                            <a class="menu" href="#">
                                {{ __('Ostale informacije') }}
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="li_menu_submenu">
                                <div class="li_m_s_w">
                                    <a href="{{ route('public-part.faq') }}"> {{__('Često postavljena pitanja')}}</a>
                                </div>
                                @foreach($restOfPages as $page)
                                    <div class="li_m_s_w">
                                        <a href="{{ route('public-part.pages.preview', ['id' => $page->id ]) }}"> {{ $page->title }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                        <li class="li_menu">
                            <a class="menu" href="{{ route('public-part.pages.business-terms') }}"> {{ __('Uslovi poslovanja') }} </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="main_menu_nav_two">
                <div class="mm_nt_link">
                    <a class="mm_nt_link_a" href="{{ route('public.part.contact-us') }}">{{ __('Kontaktirajte nas') }}</a>
                </div>
                <div class="mm_nt_button">
                    @if(Auth()->check())
                        <a href="{{ route('system.dashboard') }}">
                            <button>{{ Auth()->user()->name }}</button>
                        </a>
                    @else
                        <a href="{{ route('public-part.auth') }}">
                            <button>{{ __('Prijavi se') }}</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="mobile__menu">
            <div class="menu__bars show_menu">
                <i class="fas fa-bars"></i>
            </div>
            <div class="white__logo">
                <img src="{{ asset('files/images/default/logo_white.png') }}" alt="">
            </div>
            <div class="sign__in">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
    </div>
</header>
