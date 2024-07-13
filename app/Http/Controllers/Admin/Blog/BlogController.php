<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Core\Keyword;
use App\Models\SinglePages\SinglePage;
use App\Traits\Common\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogController extends Controller{
    use FileTrait;
    protected string $_path = 'admin.pages.blog.';

    public function index(){
        $posts = BlogPost::where('id', '>', 0);
        $posts = Filters::filter($posts);
        $filters = [
            'categoryRel.value' => __('Kategorija'),
            'title' => __('Naslov')
        ];

        return view($this->_path . 'index', [
            'posts' => $posts,
            'filters' => $filters
        ]);
    }
    protected function getFinalSlug(Request $request){
        try{
            $slug = $this->getSlug($request->title);

            /* Broj nekretnina sa istim slug-om */
            $count = BlogPost::where('slug', 'LIKE', $slug .'%')->count();

            /*
             * Ako je broj postova sa ovim slug-om veći od 0 (ako postoji neka već sa istim slugom)
             * onda neka se sljedeća zove npr villa-for-sale-1
             */

            if($count != 0) $slug = $slug . '-' . ($count);
            $request['slug'] = $slug;
        }catch (\Exception $e){}
    }

    public function create(): View{
        return view($this->_path.'create', [
            'create' => true,
            'category' => Keyword::where('keyword', 'blog_category')->orderBy('value')->pluck('value', 'id')
        ]);
    }
    public function save(Request $request): RedirectResponse{
        try{
            $this->getFinalSlug($request);
            $request['created_by'] = Auth::user()->id;

            $post = BlogPost::create($request->except(['_token', 'files']));

            return redirect()->route('system.blog.preview', ['id' => $post->id]);
        }catch (\Exception $e){ dd($e); return back()->with('error', __('Desila se greška. Molimo kontaktirajte administratora')); }
    }
    public function preview($id): View{
        return view($this->_path.'create', [
            'preview' => true,
            'category' => Keyword::where('keyword', 'blog_category')->orderBy('value')->pluck('value', 'id'),
            'post' => BlogPost::where('id', '=', $id)->first()
        ]);
    }
    public function edit($id): View{
        return view($this->_path.'create', [
            'edit' => true,
            'category' => Keyword::where('keyword', 'blog_category')->orderBy('value')->pluck('value', 'id'),
            'post' => BlogPost::where('id', '=', $id)->first()
        ]);
    }
    public function update(Request $request): RedirectResponse{
        try{
            $post = BlogPost::where('id', $request->id)->update($request->except(['_token', 'files', 'id']));

            return redirect()->route('system.blog.preview', ['id' => $request->id]);
        }catch (\Exception $e){ dd($e); return back()->with('error', __('Desila se greška. Molimo kontaktirajte administratora')); }
    }
    public function delete($id) : RedirectResponse{
        BlogPost::where('id', '=', $id)->delete();

        return redirect()->route('system.blog.index');
    }
    /**
     *  Work with images
     */
    public function updateImage(Request $request) : RedirectResponse{
        try{
            /* Add path to request for trait */
            $request['path'] = public_path('files/images/blog/');
            /* Upload file */
            $file = $this->saveFile($request, 'photo_uri', 'main_estate_image');

            $estate = BlogPost::where('id', '=', $request->id)->first();
            $estate->update(['image' => $file->id]);

            return back()->with('success', __('Fotografija uspješno spremljena!'));
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška!'));
        }
    }
}
