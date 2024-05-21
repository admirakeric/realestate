<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    protected string $_path = 'public-part.faq.';

    public function index(): View{
        return view($this->_path . 'faq');
    }
}
