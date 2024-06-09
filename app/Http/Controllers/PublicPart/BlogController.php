<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    protected string $_path = 'public-part.blog.';

    public function index(): View{
        return view($this->_path . 'index', [
            'menuCities' => Keyword::where('keyword', 'cities')->inRandomOrder()->orderBy('value')->take(5)->get(),
            'menuCategories' => Keyword::where('keyword', 'estate__type')->inRandomOrder()->orderBy('value')->take(4)->get(),
            'menuPurposes' => Keyword::where('keyword', 'estate_purpose')->orderBy('value')->get()
        ]);
    }
}
