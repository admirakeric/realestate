<div class="store_wrapper">
    <div class="inner_store_wrapper">
{{--        <div class="store_headings">--}}
{{--            <h1>--}}
{{--                {{ __('Potražite savršenu nekretninu') }}--}}
{{--            </h1>--}}
{{--            <p>--}}
{{--                {{ __('Lorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscing') }}--}}
{{--            </p>--}}
{{--        </div>--}}
        <div class="store__elements">
            <div class="large_box large_box_1 link_element" uri="{{ route('public-part.properties') }}?category=7">
                <div class="text_wrapper">
                    <div class="inner_text_wrapper">
                        <div class="text_wrapper">
                            <div class="inner_text_wrapper">
                                <h3>
                                    {{ __('Kuće') }}
                                </h3>
                                <p> {{ EstateHelper::categoryCount(7) }} </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="large_box large_box_2 link_element" uri="{{ route('public-part.properties') }}?category=9">
                <div class="small_box small_box_1">
                    <div class="text_wrapper">
                        <div class="inner_text_wrapper">
                            <h3>
                                {{ __('Stanovi') }}
                            </h3>
                            <p> {{ EstateHelper::categoryCount(9) }} </p>
                        </div>
                    </div>
                </div>
                <div class="small_box small_box_2 link_element" uri="{{ route('public-part.properties') }}?category=6">
                    <div class="text_wrapper">
                        <div class="inner_text_wrapper">
                            <h3>
                                {{ __('Apartmani') }}
                            </h3>
                            <p> {{ EstateHelper::categoryCount(6) }} </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="large_box large_box_3 link_element" uri="{{ route('public-part.properties') }}?category=11">
                <div class="small_box small_box_3">
                    <div class="text_wrapper">
                        <div class="inner_text_wrapper">
                            <h3>
                                {{ __('Zemljišta') }}
                            </h3>
                            <p> {{ EstateHelper::categoryCount(11) }} </p>
                        </div>
                    </div>

                </div>
                <div class="small_box small_box_4 link_element" uri="{{ route('public-part.properties') }}?category=10">
                    <div class="text_wrapper">
                        <div class="inner_text_wrapper">
                            <h3>
                                {{ __('Poslovni prostori') }}
                            </h3>
                            <p> {{ EstateHelper::categoryCount(10) }} </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="large_box large_box_4 link_element" uri="{{ route('public-part.properties') }}?category=12">
                <div class="text_wrapper">
                    <div class="inner_text_wrapper">
                        <h3>
                            {{ __('Vikendice') }}
                        </h3>
                        <p> {{ EstateHelper::categoryCount(12) }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
