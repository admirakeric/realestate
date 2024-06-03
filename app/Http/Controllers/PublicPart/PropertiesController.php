<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\Estates\Estate;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

class PropertiesController extends Controller{
    protected string $_path = 'public-part.properties.';

    protected int $_per_page = 8;

    public function getCities(){ return Keyword::where('keyword', 'cities')->inRandomOrder()->orderBy('value')->take(5)->get(); }
    public function getCategories(){ return Keyword::where('keyword', 'estate__type')->inRandomOrder()->orderBy('value')->take(4)->get(); }
    public function getPurposes(){ return Keyword::where('keyword', 'estate_purpose')->orderBy('value')->get(); }

    public function index(): View{
        $page = request()->get('page');
        Paginator::currentPageResolver(function () use ($page) { return $page; });

        $estates = Estate::where('published', 1);
        $searchedEstate = request()->get('searchedEstate');

        if(isset($searchedEstate->title) and $searchedEstate->title != ''){ $estates = $estates->where('title', 'LIKE', '%' . $searchedEstate->title . '%'); }
        if(isset($searchedEstate->category) and $searchedEstate->category != ''){ $estates = $estates->where('category', $searchedEstate->category); }
        if(isset($searchedEstate->purpose) and $searchedEstate->purpose != ''){ $estates = $estates->where('purpose', $searchedEstate->purpose); }
        if(isset($searchedEstate->city) and $searchedEstate->city != ''){ $estates = $estates->where('city', $searchedEstate->city); }
        if(isset($searchedEstate->sponsored) and $searchedEstate->sponsored != ''){ $estates = $estates->where('sponsored', $searchedEstate->sponsored); }
        if(isset($searchedEstate->surface_from) and $searchedEstate->surface_from != ''){ $estates = $estates->where('surface', '>=', $searchedEstate->surface_from); }
        if(isset($searchedEstate->surface_to) and $searchedEstate->surface_to != ''){ $estates = $estates->where('surface', '<=', $searchedEstate->surface_to); }
        if(isset($searchedEstate->id) and !empty($searchedEstate->id)){ $estates = $estates->where('id', $searchedEstate->id); }

        $estates = $estates->paginate($this->_per_page);

        return view($this->_path . 'index', [
            'estates' => $estates,
            'menuCities' => $this->getCities(),
            'menuCategories' => $this->getCategories(),
            'menuPurposes' => $this->getPurposes()
        ]);
    }
    public function preview($slug): View{
        $days = CarbonPeriod::between( Carbon::now(), Carbon::now()->addDays(14));
        $estate = Estate::where('slug', $slug)->first();

        if(!$estate) abort("404");

        $agent = User::inRandomOrder()->first();
        return view($this->_path . 'preview', [
            'days' => $days,
            'estate' => $estate,
            'agent' => $agent,
            'menuCities' => $this->getCities(),
            'menuCategories' => $this->getCategories(),
            'menuPurposes' => $this->getPurposes()
        ]);
    }
}
