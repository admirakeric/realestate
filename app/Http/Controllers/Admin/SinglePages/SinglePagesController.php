<?php

namespace App\Http\Controllers\Admin\SinglePages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SinglePagesController extends Controller
{
    protected string $_path = 'admin.pages.single-pages.';

    public function create(): View{
        return view($this->_path.'create');
    }

    public function save(Request $request){
        try{
            SinglePage::create($request->except(['_token']));
            return redirect()->route('system.single-pages.preview');
        }catch (\Exception $e){
        }
    }
}
