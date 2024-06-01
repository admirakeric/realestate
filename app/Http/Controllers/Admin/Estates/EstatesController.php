<?php

namespace App\Http\Controllers\Admin\Estates;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Core\Country;
use App\Models\Core\Keyword;
use App\Models\Estates\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EstatesController extends Controller{
    protected string $_path = 'admin.pages.estates.';

    public function index(): View{
        $estates = Estate::where('id', '>', 0);
        $estates = Filters::filter($estates);
        $filters = [
            'title' => __('Naziv nekretnine'),
            'categoryRel.value' => __('Kategorija'),
            'purposeRel.value' => __('Svrha'),
            'address' => __('Adresa'),
            'cityRel.value' => __('Grad')
        ];

        return view($this->_path . 'index', [
            'estates' => $estates,
            'filters' => $filters
        ]);
    }
    public function create(): View{
        return view($this->_path . 'create', [
            'createVar' => true,
            'categories' => Keyword::where('keyword', 'estate__type')->orderBy('value')->pluck('value', 'id'),
            'purposes' => Keyword::where('keyword', 'estate_purpose')->orderBy('value')->pluck('value', 'id'),
            'sponsored' => Keyword::where('keyword', 'da_ne')->pluck('value', 'id'),
            'cities' => Keyword::where('keyword', 'cities')->orderBy('value')->pluck('value', 'id'),
            'countries' => Country::pluck('name_ba', 'id')
        ]);
    }
    public function save(Request $request){
        try{
            $slug = $this->getSlug($request->title);

            /* Broj nekretnina sa istim slug-om */
            $count = Estate::where('slug', 'LIKE', $slug .'%')->count();

            /*
             * Ako je broj nekretnina sa ovim slug-om veći od 0 (ako postoji neka već sa istim slugom)
             * onda neka se sljedeća zove npr villa-for-sale-1
             */

            if($count != 0) $slug = $slug . '-' . ($count);
            $request['slug'] = $slug;
            $request['created_by'] = Auth::user()->id;

            $estate = Estate::create($request->except(['_token']));

            return redirect()->route('system.estates.preview', ['slug' => $estate->slug]);
        }catch (\Exception $e){}
    }
    public function preview($slug): View{
        /* Daj željenu nekretninu */
        $estate = Estate::where('slug', $slug)->first();

        return view($this->_path . 'create', [
            'previewVar' => true,
            'categories' => Keyword::where('keyword', 'estate__type')->orderBy('value')->pluck('value', 'id'),
            'purposes' => Keyword::where('keyword', 'estate_purpose')->orderBy('value')->pluck('value', 'id'),
            'sponsored' => Keyword::where('keyword', 'da_ne')->pluck('value', 'id'),
            'cities' => Keyword::where('keyword', 'cities')->orderBy('value')->pluck('value', 'id'),
            'countries' => Country::pluck('name_ba', 'id'),
            'estate' => $estate
        ]);
    }
    public function edit($slug): View{
        /* Daj željenu nekretninu */
        $estate = Estate::where('slug', $slug)->first();

        return view($this->_path . 'create', [
            'editVar' => true,
            'categories' => Keyword::where('keyword', 'estate__type')->orderBy('value')->pluck('value', 'id'),
            'purposes' => Keyword::where('keyword', 'estate_purpose')->orderBy('value')->pluck('value', 'id'),
            'sponsored' => Keyword::where('keyword', 'da_ne')->pluck('value', 'id'),
            'cities' => Keyword::where('keyword', 'cities')->orderBy('value')->pluck('value', 'id'),
            'countries' => Country::pluck('name_ba', 'id'),
            'estate' => $estate
        ]);
    }
    public function update(Request $request){
        try{
            $slug = $this->getSlug($request->title);

            /* Broj nekretnina sa istim slug-om */
            $count = Estate::where('slug', 'LIKE', $slug .'%')->where('id', '!=', $request->id)->count();

            /*
             * Ako je broj nekretnina sa ovim slug-om veći od 0 (ako postoji neka već sa istim slugom)
             * onda neka se sljedeća zove npr villa-for-sale-1
             */

            if($count != 0) $slug = $slug . '-' . ($count);
            $request['slug'] = $slug;

            $estate = Estate::where('id', $request->id)->update($request->except(['_token', 'id']));

            return redirect()->route('system.estates.preview', ['slug' => $request->slug]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function delete($slug){
        try{
            $estate = Estate::where('slug', $slug)->delete();

            return redirect()->route('system.estates.index');
        }catch (\Exception $e){}
    }
}
