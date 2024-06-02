<div class="wrapper_cities">
    <div class="inner_wrapper_cities">
        <div class="cities_headings">
            <h1> {{ __('Gradovi') }} </h1>
            <p> {{ __('Istražite ponude nekretnina u gradovima: Bihać, Bužim, Cazin i Velika Kladuša!') }} </p>
        </div>
        <div class="cities_wrap_info">
            <div class="image__wrapper image__wrapper_1 link_element" uri="{{ route('public-part.properties') }}?city=16">
                <div class="text_wrapper">
                    <div class="text_center_wrapper">
                        <h4>{{ __('Bihać') }}</h4>
                        <p> {{ EstateHelper::cityCount(16) }} </p>
                    </div>
                </div>
            </div>
            <div class="image__wrapper image__wrapper_2 link_element" uri="{{ route('public-part.properties') }}?city=18">
                <div class="text_wrapper">
                    <div class="text_center_wrapper">
                        <h4>{{ __('Bužim') }}</h4>
                        <p> {{ EstateHelper::cityCount(18) }} </p>
                    </div>
                </div>
            </div>
            <div class="image__wrapper image__wrapper_3 link_element" uri="{{ route('public-part.properties') }}?city=17">
                <div class="text_wrapper">
                    <div class="text_center_wrapper">
                        <h4>{{ __('Cazin') }}</h4>
                        <p> {{ EstateHelper::cityCount(17) }} </p>
                    </div>
                </div>
            </div>
            <div class="image__wrapper image__wrapper_4 link_element" uri="{{ route('public-part.properties') }}?city=19">
                <div class="text_wrapper">
                    <div class="text_center_wrapper">
                        <h4>{{ __('Velika Kladuša') }}</h4>
                        <p> {{ EstateHelper::cityCount(19) }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
