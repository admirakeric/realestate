<form action="{{ route('public-part.blog.index') }}" method="get" class="m-0 p-0">
    <section class="desktop-content-search sticky">
        <div class="search__container">
            <div class="title__w title__w__double">
                <div class="icon_w">
                    <i class="fas fa-search"></i>
                </div>
                <input type="text" name="title" id="title" placeholder="{{ __('Pretražite..') }}" value="{{ isset($searchedEstate) ? $searchedEstate->title : '' }}">
            </div>

            <div class="dropdown_w">
                {{ html()->select('category', $filtersBlogCategories)->class('form-control form-control-sm mt-1')->id('category')->value(isset($searchedEstate) ? $searchedEstate->category : '') }}
                <div class="icon_w">
                    <i class="fas fa-chevron-up"></i>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <div class="advanced__wrapper advanced__wrapper__short">
                <button class="search_btn" type="submit">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>
            </div>
        </div>
    </section>
</form>
