<!-- footer -->
<div class="con__black">
    <footer>
        <div class="footer__con-top">
            <div class="footer__con-left">
                <a href="{{ route('public-part.home') }}">
                    <img src="{{ asset('files/images/default/logo_full_white.png') }}" alt="">
                </a>

                <div class="footer__address">
                    <h5 class="heading-h5">{{ __('Adresa:') }}</h5>
                    <a target="_blank" href="https://maps.app.goo.gl/yhn2o5wwnFiipaxm8"> {{ __('Ćuprija BB, 77220 Cazin.') }}</a>
                </div>
                <div class="footer__contact">
                    <h5 class="heading-h5">{{ __('Kontakt:') }}</h5>
                    <a class="underlined" href="tel:0038761786860">{{ __('387 61 786 860') }}</a>
                    <a class="underlined" href="mailto:europlac-nekretnine@hotmail.com"> {{ __('europlac-nekretnine@hotmail.com') }} </a>
                </div>
                <div class="footer__socials">
                    <a href="https://www.facebook.com/europlac.nekretnine/" target="_blank">
                        <img src="{{ asset('files/images/default/fb_1.png') }}" alt="Facebook icon"/>
                    </a>
                    <a href="https://www.instagram.com/europlac_cazin/" target="_blank">
                        <img src="{{ asset('files/images/default/ig_1.png') }}" alt="Instagram icon"/>
                    </a>
                    <a href="https://www.youtube.com/@euro-placcazin" target="_blank">
                        <img src="{{ asset('files/images/default/yt_1.png') }}" alt="Youtube icon"/>
                    </a>
                </div>
            </div>
            <div class="footer__con-right">
                <ul class="footer__list1">
                    <li class="footer__list1-item">
                        <h4 class="footer__list1-header">{{ __('O nama') }}</h4>
                    </li>
                    <li class="footer__list1-item">
                        <a class="footer__list1-link" href="{{ route('public-part.pages.about-us') }}"> {{ __('Naš tim') }} </a>
                    </li>
                    <li class="footer__list1-item">
                        <a class="footer__list1-link" href="{{ route('public.part.contact-us') }}">{{ __('Kontaktirajte nas') }}</a>
                    </li>
                    <li class="footer__list1-item">
                        <a class="footer__list1-link" href="#"> {{ __('Blog sekcija') }} </a>
                    </li>
                    <li class="footer__list1-item">
                        <a class="footer__list1-link" href="#"> {{ __('Ostalo') }} </a>
                    </li>
                </ul>
                <ul class="footer__list2">
                    <li class="footer__list1-item">
                        <h4 class="footer__list1-header">{{ __('Nekretnine') }}</h4>
                    </li>
                    @foreach($categories as $key => $category)
                        <li class="footer__list2-item">
                            <a class="footer__list2-link" href="{{ route('public-part.properties') }}?category={{ $key }}">{{ $category }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer__con-bottom">
            <p> <a href="https://europlac-nekretnine.com/">© {{ date('Y') }} {{ __('Euro-Plac d.o.o') }}</a> <span>|</span> <a href="https://cozyfirm.com/">{{ __('Development: Cozy Firm d.o.o') }}</a></p>
            <ul class="con__bottom-list">
                <li class="con__bottom-item">
                    <a href="{{ route('public-part.pages.privacy-policy') }}" class="con__bottom-link underlined"> {{ __('Pravila privatnosti') }} </a>
                </li>
                <li class="con__bottom-item">
                    <a href="{{ route('public-part.pages.terms-and-conditions') }}" class="con__bottom-link underlined"> {{ __('Uslovi korištenja') }} </a>
                </li>
                <li class="con__bottom-item">
                    <a href="{{ route('public-part.pages.cookies') }}" class="con__bottom-link underlined">{{ __('Korisnički kolačići') }}</a>
                </li>
            </ul>
        </div>
    </footer>
</div>
