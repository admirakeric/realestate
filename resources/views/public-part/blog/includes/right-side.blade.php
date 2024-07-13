<div class="right_side sticky">
    <div class="inner_wrapper">
        <h4>{{ __('Posljednje novosti') }}</h4>
        @foreach($blogCategories as $category)
            <div class="first__layer">
                <a>
                    <i class="fas fa-chevron-right"></i>
                    {{ $category->value ?? '' }}
                </a>
                <div class="second__layer">
                    @php $counter = 1; @endphp
                    @foreach($category->blogPostsRel as $blogPost)
                        @php if($counter++ > 3 ) break; @endphp
                        <a href="{{ route('public-part.blog.preview', ['slug' => $blogPost->slug ]) }}" >
                            <i class="fas fa-chevron-right"></i>
                            {{ $blogPost->title ?? '' }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <div class="inner_wrapper">
        <h4>{{ __('Kategorije') }}</h4>
        <div class="first__layer first__layer__only">
            @foreach($blogCategories as $category)
                <a href="{{ route('public-part.blog.search-by-category', ['category' => $category->id ]) }}" class="@isset($highlightedCategory) @if($category->id == $highlightedCategory) active @endif @endisset">
                    <i class="fas fa-chevron-right"></i>
                    {{ $category->value ?? '' }}
                </a>
            @endforeach
        </div>
    </div>
</div>
