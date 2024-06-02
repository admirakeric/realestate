<form action="{{ route('public-part.properties') }}" method="get" class="m-0 p-0">
    <section class="desktop-content-search sticky">
        <div class="search__container">
            <div class="title__w">
                <div class="icon_w">
                    <i class="fas fa-search"></i>
                </div>
                <input type="text" name="title" id="title" placeholder="{{ __('Pretražite..') }}" value="{{ isset($searchedEstate) ? $searchedEstate->title : '' }}">
            </div>

            <div class="dropdown_w">
                {{ html()->select('category', $categories)->class('form-control form-control-sm mt-1')->id('category')->value(isset($searchedEstate) ? $searchedEstate->category : '') }}
                <div class="icon_w">
                    <i class="fas fa-chevron-up"></i>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <div class="dropdown_w">
                {{ html()->select('purpose', $purposes)->class('form-control form-control-sm mt-1')->id('purpose')->value(isset($searchedEstate) ? $searchedEstate->purpose : '') }}
                <div class="icon_w">
                    <i class="fas fa-chevron-up"></i>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <div class="advanced__wrapper">
                <div class="advanced_btn">
                    <i class="fas fa-cog"></i>
                    <p>{{ __('Napredna pretraga') }}</p>
                </div>

                <button class="search_btn" type="submit">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>
            </div>
        </div>

        <div class="advanced__filters">
            <div class="dropdown_w">
                {{ html()->select('city', $cities)->class('form-control form-control-sm mt-1')->id('city')->value(isset($searchedEstate) ? $searchedEstate->city : '') }}

                <div class="icon_w">
                    <i class="fas fa-chevron-up"></i>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <div class="dropdown_w">
                {{ html()->select('sponsored', $sponsored)->class('form-control form-control-sm mt-1')->id('sponsored')->value(isset($searchedEstate) ? $searchedEstate->sponsored : '') }}

                <div class="icon_w">
                    <i class="fas fa-chevron-up"></i>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <div class="input_w">
                <input type="number" id="surface_from" name="surface_from" placeholder="{{ __('Površina od') }}" min="0" max="1000000" step="1" value="{{ isset($searchedEstate) ? $searchedEstate->surface_from : '' }}">
            </div>
            <div class="input_w">
                <input type="number" id="surface_to" name="surface_to" placeholder="{{ __('Površina do') }}" min="0" max="1000000" step="1" value="{{ isset($searchedEstate) ? $searchedEstate->surface_to : '' }}">
            </div>
            <div class="input_w">
                <input type="text" id="id" name="id" placeholder="{{ __('ID nekretnine') }}" value="{{ isset($searchedEstate) ? $searchedEstate->id : '' }}">
            </div>
        </div>
    </section>
</form>
