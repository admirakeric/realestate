<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Core\Keyword;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

class BlogController extends Controller{
    protected string $_path = 'public-part.blog.';
    protected int $_per_page = 3;

    public function index($category = null): View{
        $highlightedCategory = null;

        $page = request()->get('page');
        Paginator::currentPageResolver(function () use ($page) { return $page; });

        if($category){
            $posts = BlogPost::where('category', '=', $category)->orderBy('id', 'DESC');
            $highlightedCategory = $category;
        }else{
            $posts = BlogPost::orderBy('id', 'DESC');
        }

        $searchedPost = request()->get('searchedEstate');

        if(isset($searchedPost->title) and $searchedPost->title != ''){ $posts = $posts->where('title', 'LIKE', '%' . $searchedPost->title . '%'); }
        if(isset($searchedPost->category) and $searchedPost->category != ''){ $posts = $posts->where('category', $searchedPost->category); $highlightedCategory = $searchedPost->category;  }

        $posts = $posts->paginate($this->_per_page);

        return view($this->_path . 'index', [
            'blogCategories' => Keyword::where('keyword', 'blog_category')->orderBy('value')->get(),
            'filtersBlogCategories' => Keyword::where('keyword', 'blog_category')->orderBy('value')->pluck('value', 'id')->prepend('Sve kategorije', ''),
            'posts' => $posts,
            'highlightedCategory' => $highlightedCategory
        ]);
    }
    public function preview($slug): View{
        return view($this->_path . 'preview', [
            'blogCategories' => Keyword::where('keyword', 'blog_category')->orderBy('value')->get(),
            'filtersBlogCategories' => Keyword::where('keyword', 'blog_category')->orderBy('value')->pluck('value', 'id')->prepend('Sve kategorije', ''),
            'post' => BlogPost::where('slug', '=', $slug)->first()
        ]);
    }
}
