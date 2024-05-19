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
                                +387 63 786 416
                            </p>
                            <p class="p-thin">
                                europlac-nekretnine@hotmail.com
                            </p>
                        </div>
                    </div>
                    <div class="icons-info">
                        <div class="icons">
                            <img src="{{ asset('files/images/default/location.png') }}" alt="">
                        </div>
                        <div class="other-infos">
                            <p class="p-bold">
                                Ćuprija bb <br> Generala Izeta Nanića
                            </p>
                            <p class="p-thin">
                                Cazin 77220
                            </p>
                        </div>
                    </div>
                    <div class="icons-info">
                        <div class="icons">
                            <img src="{{ asset('files/images/default/clock.png') }}" alt="">
                        </div>
                        <div class="other-infos">
                            <p class="p-bold">
                                09:00 - 17:00
                            </p>
                            <p class="p-thin">
                                Ponedjeljak - Petak
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
                            <a target="_blank" class="btn-icon-sm" href="#">
                                <img src="{{ asset('files/images/default/in.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn-icon-sm" href="https://www.youtube.com/@euro-placcazin">
                                <img src="{{ asset('files/images/default/yt.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="btn-icon-sm" href="#">
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
                            <a class="menu" href="#"> {{ __('O nama') }} </a>
                        </li>
                        <li class="li_menu">
                            <a class="menu" href="#">
                                {{ __('Nekretnine') }}
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="li_menu_submenu">
                                <div class="li_m_s_w">
                                    <a href="{{ route('public-part.properties') }}"> {{__('Sve nekretnine')}}</a>
                                </div>
                                <div class="li_m_s_w">
                                    <a href="{{ route('public-part.properties') }}"> {{__('Kuće')}}</a>
                                </div>
                                <div class="li_m_s_w">
                                    <a href="{{ route('public-part.properties') }}"> {{__('Stanovi')}}</a>
                                </div>
                                <div class="li_m_s_w">
                                    <a href="{{ route('public-part.properties') }}"> {{__('Apartmani')}}</a>
                                </div>
                                <div class="li_m_s_w">
                                    <a href="{{ route('public-part.properties') }}"> {{__('Zemljišta')}}</a>
                                </div>
                                <div class="li_m_s_w">
                                    <a href="{{ route('public-part.properties') }}"> {{__('Ostalo')}}</a>
                                </div>
                            </div>
                        </li>
                        <li class="li_menu">
                            <a class="menu" href="#"> {{ __('Novosti') }} </a>
                        </li>
                        <li class="li_menu">
                            <a class="menu" href="#">
                                {{ __('Ostale informacije') }}
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="li_menu_submenu">
                                <div class="li_m_s_w">
                                    <a href="#"> {{__('Kako prodati nekretninu?')}}</a>
                                </div>
                                <div class="li_m_s_w">
                                    <a href="#"> {{__('Novosti iz svijeta nekretnina')}}</a>
                                </div>
                                <div class="li_m_s_w">
                                    <a href="#"> {{__('Objekti u izgradnji')}}</a>
                                </div>
                                <div class="li_m_s_w">
                                    <a href="#"> {{__('Ostale informacije')}}</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="main_menu_nav_two">
                <div class="mm_nt_link">
                    <a class="mm_nt_link_a" href="#">{{ __('Kontaktirajte nas') }}</a>
                </div>
                <div class="mm_nt_button">
                    <a href="#">
                        <button>{{ __('Prijavi se') }}</button>
                    </a>
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
