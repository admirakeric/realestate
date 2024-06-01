<?php

namespace App\Http\Controllers\Admin\Keywords;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KeywordsController extends Controller{
    protected string $_path = 'admin.pages.keywords.';

    public function index(): View{
        return view($this->_path.'index', [
            'keywords' => Keyword::getKeywords()
        ]);
    }
    public function previewInstances($key){
        $instances = Keyword::where('keyword', $key);
        $instances = Filters::filter($instances);
        $filters = [
            'name' => __('Vrijednost'),
            'description' => __('Kratki opis'),
            'value' => __('Specijalna vrijednost')
        ];

        return view($this->_path.'preview-instances', [
            'instances' => $instances,
            'filters' => $filters,
            'keyword' => Keyword::getKeyword($key),
            'key' => $key
        ]);
    }
    public function newInstance($key){
        return view($this->_path.'create', [
            'keyword' => Keyword::getKeyword($key),
            'key' => $key,
            'create' => true
        ]);
    }
    public function saveInstance(Request $request){
        try{
            Keyword::create($request->except(['_token']));
            return $this->jsonSuccess(__('Uspješno unešena instanca'), route('system.settings.keywords.preview-instances', ['key' => $request->keyword ]));
        }catch (\Exception $e){ return $this->jsonResponse('14000', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));}
    }
    public function editInstance($id){
        $instance = Keyword::where('id', $id)->first();
        $key = $instance->keyword;

        return view($this->_path.'create', [
            'keyword' => Keyword::getKeyword($key),
            'key' => $key,
            'edit' => true,
            'instance' => $instance
        ]);
    }
    public function updateInstance(Request $request){
        try{
            Keyword::where('id', $request->id)->update($request->except(['_token', '_method', 'id']));
            return $this->jsonSuccess(__('Uspješno ažurirana instanca'), route('system.settings.keywords.preview-instances', ['key' => $request->keyword ]));
        }catch (\Exception $e){ return $this->jsonResponse('14000', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));}
    }
    public function deleteInstance($id){
        try{
            $keyword = Keyword::where('id', $id)->first();
            $key = $keyword->keyword;
            $name = $keyword->name;

            $keyword->delete();

            return redirect()->route('system.settings.keywords.preview-instances', ['key' => $key])->with('success', __('Uspješno izbrisana instanca:') . $name . "!");
        }catch (\Exception $e){
            return redirect()->route('system.settings.keywords.preview-instances', ['key' => $key])->with('error', __('Desila se greška prilikom brisanja instance instanca:') . $name . ", molimo pokušajte ponovo!");
        }
    }
}
