<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Estates\Estate;
use App\Models\SinglePages\SinglePage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    protected string $_path = 'public-part.home.';

    public function home(): View{
        return view($this->_path . 'home', [
            'estates' => Estate::where('published', 1)->where('sponsored', 20)->inRandomOrder()->take(6)->get()
        ]);
    }

    public function privacyPolicy(): View{ return view('public-part.pages.single-page', [ 'page' => SinglePage::where('id', 4)->first() ]); }
    public function termsAndConditions(): View{ return view('public-part.pages.single-page', [ 'page' => SinglePage::where('id', 2)->first() ]); }
    public function cookies(): View{ return view('public-part.pages.single-page', [ 'page' => SinglePage::where('id', 3)->first() ]); }
    public function aboutUs(): View{ return view('public-part.pages.single-page', [ 'page' => SinglePage::where('id', 1)->first() ]); }
    public function preview($id): View{ return view('public-part.pages.single-page', [ 'page' => SinglePage::where('id', $id)->first() ]); }
}
