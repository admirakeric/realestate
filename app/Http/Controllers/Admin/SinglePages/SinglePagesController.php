<?php

namespace App\Http\Controllers\Admin\SinglePages;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\SinglePages\SinglePage;
use App\Models\User;
use App\Traits\Common\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SinglePagesController extends Controller{
    use FileTrait;
    protected string $_path = 'admin.pages.single-pages.';
    public function index(): View{
        $pages = SinglePage::where('id', '>', 0);
        $pages = Filters::filter($pages);
        $filters = [
            'categoryRel' => __('Kategorija'),
            'title' => __('Naslov')
        ];

        return view($this->_path . 'index', [
            'pages' => $pages,
            'filters' => $filters
        ]);
    }
    public function create(): View{
        return view($this->_path.'create', [
            'create' => true,
            'category' => Keyword::where('keyword', 'page_type')->where('id', 24)->orderBy('value')->pluck('value', 'id')
        ]);
    }

    public function save(Request $request): RedirectResponse{
        try{
            $page = SinglePage::create($request->except(['_token']));
            return redirect()->route('system.single-pages.edit', ['id' => $page->id ]);
        }catch (\Exception $e){  }
    }
    public function edit($id): View{
        return view($this->_path.'create', [
            'edit' => true,
            'page' => SinglePage::where('id', $id)->first(),
            'category' => Keyword::where('keyword', 'page_type')->orderBy('value')->pluck('value', 'id')
        ]);
    }
    public function update(Request $request): RedirectResponse{
        try{
            SinglePage::where('id', $request->id)->update($request->except(['_token', 'id']));
            return back();
        }catch (\Exception $e){  }
    }
    public function delete($id) : RedirectResponse{
        SinglePage::where('id', $id)->delete();

        return redirect()->route('system.single-pages.index');
    }
    public function updateImage(Request $request) : RedirectResponse{
        try{
            /* Add path to request for trait */
            $request['path'] = public_path('files/images/pages/');
            /* Upload file */
            $file = $this->saveFile($request, 'photo_uri', 'main_estate_image');

            $estate = SinglePage::where('id', $request->id)->first();
            $estate->update(['image' => $file->id]);

            return back()->with('success', __('Fotografija uspješno spremljena!'));
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška!'));
        }
    }
}
