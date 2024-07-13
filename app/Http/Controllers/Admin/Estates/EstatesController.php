<?php

namespace App\Http\Controllers\Admin\Estates;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Core\Country;
use App\Models\Core\File;
use App\Models\Core\Keyword;
use App\Models\Estates\Estate;
use App\Models\Estates\EstateImage;
use App\Models\Estates\Feature;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Intervention\Image\Laravel\Facades\Image;

class EstatesController extends Controller{
    use FileTrait, ResponseTrait;

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
        }catch (\Exception $e){}
    }
    public function delete($slug): RedirectResponse{
        try{
            $estate = Estate::where('slug', $slug)->delete();

            return redirect()->route('system.estates.index');
        }catch (\Exception $e){}
    }

    /**
     *  Work with images
     */
    public function insertNewImage($slug): View{
        $estate = Estate::where('slug', $slug)->first();

        return view($this->_path . 'new-image', [
            'estate' => $estate
        ]);
    }
    public function saveNewImage(Request $request): RedirectResponse{
        try{
            $request['path'] = public_path('files/images/estates');

            if($request->has('file_uri')){
                try{
                    $files = $request->file('file_uri');

                    foreach ($files as $file){
                        $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
                        $name = md5($file->getClientOriginalName().time()).'.'.$ext;

                        $image = Image::read($file);


                        // $file->move($request->path, $name);
                        // $image = Image::make(public_path('images/background.jpg'));

                        /* insert watermark at bottom-right corner with 10px offset */
                        $image->place(public_path('files/images/default/round_logo_small.png'), 'bottom-right', 10, 10);
                        // $image->encode($ext);

                        $image->save($request->path . '/'. $name);

                        $fileObj = File::create([
                            'file' => $file->getClientOriginalName(),
                            'name' => $name,
                            'ext' => $ext,
                            'type' => 'estate_image',
                            'path' => $request->path
                        ]);

                        $image = EstateImage::create([
                            'estate_id' => $request->id,
                            'image' => $fileObj->id
                        ]);
                    }
                }catch (\Exception $e){
                    dd($e);
                }
            }

            return back()->with('success', __('Fotografija uspješno spremljena!'));
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška!'));
        }
    }
    public function deleteNewImage($id): RedirectResponse{
        try{
            $estateImage = EstateImage::where('id', $id)->first();

            /* Delete from files and remove image */
            $file = File::where('id', $estateImage->image)->first();

            $file->delete();
            $estateImage->delete();

            try{
                unlink($file->path . '/' . $file->name) ;
            }catch (\Exception $e){}

            return back()->with('success', __('Uspješno izbrisana fotografija!'));
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška!'));
        }
    }
    public function updateMainImage(Request $request) : RedirectResponse{
        try{
            /* Add path to request for trait */
            $request['path'] = public_path('files/images/estates');
            /* Upload file */
            $file = $this->saveFile($request, 'photo_uri', 'main_estate_image');

            $estate = Estate::where('id', $request->id)->first();
            $estate->update(['image' => $file->id]);

            return back()->with('success', __('Fotografija uspješno spremljena!'));
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška!'));
        }
    }

    /*
     *  Google maps
     */
    public function editLocation($slug): View{
        $estate = Estate::where('slug', $slug)->first();

        return view($this->_path . 'location', [
            'estate' => $estate
        ]);
    }
    public function updateLocation(Request $request): JsonResponse | bool | string{
        try{
            Estate::where('id', $request->id)->update([
                'latitude' => $request->lat,
                'longitude' => $request->lon
            ]);

            return $this->jsonSuccess(__('Uspješno ažurirano!'));
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška!'));
        }
    }

    /*
     *  Features
     */
    public function editFeatures($slug): View{
        $estate = Estate::where('slug', $slug)->first();

        return view($this->_path . 'features', [
            'estate' => $estate,
            'features' => Keyword::where('keyword', 'estate_features')->orderBy('value')->get(),
        ]);
    }
    public function updateFeatures(Request $request): RedirectResponse{
        try{
            $estate = Estate::where('id', $request->id)->first();
            Feature::where('estate_id', $request->id)->delete();

            foreach ($request->features as $feature){
                Feature::create([
                    'estate_id' => $request->id,
                    'feature' => $feature
                ]);
            }

            return redirect()->route('system.estates.preview', ['slug' => $estate->slug]);
        }catch (\Exception $e){ return back(); }
    }
}
