<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\Pages\Faq;
use App\Models\SinglePages\SinglePage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    protected string $_path = 'admin.pages.faq.';

    public function index(): View{
        $faqs = Faq::where('id', '>', 0);
        $faqs = Filters::filter($faqs);
        $filters = [
            'question' => __('Pitanje')
        ];

        return view($this->_path . 'faq_admin', [
            'faqs' => $faqs,
            'filters' => $filters
        ]);
    }

    public function create(): View{
        $categories = Keyword::where("keyword", "faq")->pluck("value", "id");

        return view($this->_path . 'faq_admin_create', [
            "categories" => $categories,
            "create" => true
        ]);
    }

    public function save(Request $request){
        try{
            if(!$request->question) return back()->with('message', __('Molimo unesite Vaše pitanje!'));
            if(!$request->answer) return back()->with('message', __('Molimo unesite Vaš odgovor!'));

            $faq = Faq::create([
                'category'=>$request->category,
                'question'=>$request->question,
                'answer'=>$request->answer
            ]);
            return redirect()->route('system.faq.preview', [
                'id'=>$faq->id
            ]);
        }catch (\Exception $e){
            return back()->with('message', __('Desila se greška!'));
        }
    }

    public function preview($id){
        $categories = Keyword::where("keyword", "faq")->pluck("value", "id");

        return view($this->_path . 'faq_admin_create', [
            "categories" => $categories,
            "preview" => true,
            "faq" => Faq::where("id", $id)->first()
        ]);
    }

    public function edit($id){
        $categories = Keyword::where("keyword", "faq")->pluck("value", "id");

        return view($this->_path . 'faq_admin_create', [
            "categories" => $categories,
            "edit" => true,
            "faq" => Faq::where("id", $id)->first()
        ]);
    }

    public function update(Request $request){
        try{
            if(!$request->question) return back()->with('message', __('Molimo unesite Vaše pitanje!'));
            if(!$request->answer) return back()->with('message', __('Molimo unesite Vaš odgovor!'));

            Faq::where("id", $request->id)->update([
                'category'=>$request->category,
                'question'=>$request->question,
                'answer'=>$request->answer
            ]);
            return redirect()->route('system.faq.preview', [
                'id'=>$request->id
            ]);
        }catch (\Exception $e){
            return back()->with('message', __('Desila se greška!'));
        }
    }
    public function delete($id): RedirectResponse{
        Faq::where('id', $id)->delete();

        return redirect()->route('system.faq.index');
    }
}
