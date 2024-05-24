<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class FaqController extends Controller
{
    protected string $_path = 'admin.faq.';

    public function index(): View{
        return view($this->_path . 'faq_admin');
    }

    public function create(): View{
        return view($this->_path . 'faq_admin_create');
    }
}
