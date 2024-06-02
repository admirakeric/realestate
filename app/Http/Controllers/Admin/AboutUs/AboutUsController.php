<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    protected string $_path = 'admin.pages.about-us.';

    public function index(): View{
        return view($this->_path.'index');
    }
}
