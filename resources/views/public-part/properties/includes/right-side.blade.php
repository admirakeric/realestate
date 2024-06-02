<div class="right_side sticky">
    <div class="inner_wrapper">
        <h4>{{ __('Vrste nekretnina') }}</h4>
        @foreach($menuPurposes as $purpose)
            <div class="first__layer">
                <a href="{{ route('public-part.properties') }}?purpose={{ $purpose->id }}">
                    <i class="fas fa-chevron-right"></i>
                    {{ $purpose->value ?? '' }}
                </a>
                <div class="second__layer">
                    @foreach($menuCategories as $category)
                        <a href="{{ route('public-part.properties') }}?purpose={{ $purpose->id }}&category={{ $category->id }}">
                            <i class="fas fa-chevron-right"></i>
                            {{ $category->value ?? '' }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <div class="inner_wrapper">
        <h4>{{ __('Gradovi') }}</h4>
        <div class="first__layer first__layer__only">
            @foreach($menuCities as $city)
                <a href="{{ route('public-part.properties') }}?city={{ $city->id }}">
                    <i class="fas fa-chevron-right"></i>
                    {{ $city->value ?? '' }}
                </a>
            @endforeach
        </div>
    </div>
</div>
