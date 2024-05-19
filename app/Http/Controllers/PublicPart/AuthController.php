<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    protected string $_path = 'public-part.login.';

    public function auth(): View{
        return view($this->_path . 'login');
    }
}
