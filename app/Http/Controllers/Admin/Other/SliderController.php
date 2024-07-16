<?php

namespace App\Http\Controllers\Admin\Other;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Other\Slider;
use App\Traits\Common\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller{
    use FileTrait;
    protected string $_path = 'admin.pages.other.slider.';

    public function index(): View{
        $slides = Slider::where('id', '>', 0);
        $slides = Filters::filter($slides);
        $filters = [
            'title' => __('Naslov'),
            'description' => __('Opis'),
            'link' => __('Link')
        ];

        return view($this->_path . 'index', [
            'slides' => $slides,
            'filters' => $filters
        ]);
    }
    public function create(): View{
        return view($this->_path.'create', [
            'create' => true
        ]);
    }
    public function save(Request $request): RedirectResponse{
        try{
            /* Add path to request for trait */
            $request['path'] = public_path('files/images/slider/');
            /* Upload file */
            $desktopImg = $this->saveFile($request, 'desktop_img', 'slider_img');
            $mobileImg  = $this->saveFile($request, 'mobile_img', 'slider_img');

            $slider = Slider::create([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'desktop_img' => $desktopImg->id,
                'mobile_img' => $mobileImg->id
            ]);
        }catch (\Exception $e){}

        return redirect()->route('system.slider.index');
    }
    public function delete($id): RedirectResponse{
        Slider::where('id', '=', $id)->delete();

        return redirect()->route('system.slider.index');
    }
}
