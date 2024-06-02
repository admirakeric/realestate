<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Estates\Estate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    protected string $_path = 'public-part.home.';

    public function home(): View{
        return view($this->_path . 'home', [
            'estates' => Estate::where('published', 1)->where('sponsored', 20)->inRandomOrder()->take(6)->get()
        ]);
    }
}
