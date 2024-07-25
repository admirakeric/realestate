<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Mail\ContactUS\SendUsMessage;
use App\Models\Core\Event;
use App\Models\Core\EventVisit;
use App\Models\Core\Keyword;
use App\Models\Estates\Estate;
use App\Models\Estates\WishList;
use App\Models\User;
use App\Traits\Common\CommonTrait;
use App\Traits\Http\HttpTrait;
use App\Traits\Http\ResponseTrait;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PropertiesController extends Controller{
    use CommonTrait, ResponseTrait, HttpTrait;

    protected string $_path = 'public-part.properties.';
    protected string $_base_email = 'europlac-nekretnine@hotmail.com';
    // protected string $_base_email = 'kaapiic@gmail.com';

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
        if(isset($searchedEstate->category) and $searchedEstate->category != ''){
            if($searchedEstate->category == 'wishlist'){
                $myWishList = WishList::where('ip_addr', '=', $this->getIpAddr())->get(['estate_id'])->toArray();

                $estates = $estates->whereIn('id', $myWishList);
            }else{
                $estates = $estates->where('category', $searchedEstate->category);
            }
        }
        if(isset($searchedEstate->purpose) and $searchedEstate->purpose != ''){ $estates = $estates->where('purpose', $searchedEstate->purpose); }
        if(isset($searchedEstate->city) and $searchedEstate->city != ''){ $estates = $estates->where('city', $searchedEstate->city); }
        if(isset($searchedEstate->sponsored) and $searchedEstate->sponsored != ''){ $estates = $estates->where('sponsored', $searchedEstate->sponsored); }
        if(isset($searchedEstate->surface_from) and $searchedEstate->surface_from != ''){ $estates = $estates->where('surface', '>=', $searchedEstate->surface_from); }
        if(isset($searchedEstate->surface_to) and $searchedEstate->surface_to != ''){ $estates = $estates->where('surface', '<=', $searchedEstate->surface_to); }
        if(isset($searchedEstate->id) and !empty($searchedEstate->id)){ $estates = $estates->where('id', $searchedEstate->id); }

        $estates = $estates->orderBy('updated_at', 'DESC');
        $estates = $estates->paginate($this->_per_page);

        return view($this->_path . 'index', [
            'estates' => $estates->appends(request()->query()),
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
            'menuPurposes' => $this->getPurposes(),
            'timeArr' => self::formTimeArr(7, 17)
        ]);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    public function scheduleVisit(Request $request): JsonResponse{
        try{
            $request['datetime'] = Carbon::parse($request->date . ' ' . $request->time)->format('Y-m-d h:i:s');

            $event = Event::create([
                'type' => 'visit',
                'date' => $request->date,
                'time' => $request->time,
                'datetime' => $request->datetime
            ]);

            $visit = EventVisit::create([
                'event_id' => $event->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'message' => $request->message,
                'estate_id' => $request->estate_id,
            ]);

            $estate = Estate::where('id', $request->estate_id)->first();
            $reason = "Posjeta nekretnine \"" . $estate->title . "\" " . (Carbon::parse($request->date)->format('d.m.Y')) . ' u ' . $request->time .'.';

            try{
                /* Send an email */
                Mail::to($this->_base_email)->send(new SendUsMessage('Posjeta nekretnini', $request->name, $request->email, $request->name, $request->email, $request->phone, $request->message, $reason));

                /* Send copy to sender */
                Mail::to($request->email)->send(new SendUsMessage('Kopija - Posjeta nekretnini', 'No-Reply', $this->_base_email, $request->name, $request->email, $request->phone, $request->message, $reason));
            }catch (\Exception $e){}

            return $this->jsonSuccess(__('Zahtjev uspješno kreiran. Naši agenti će Vas uskoro kontaktirati'));
        }catch (\Exception $e){
            return $this->jsonError('1000', __('Desila se greška. Molimo pokušajte ponovo.'));
        }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    public function addRemoveFromWishList(Request $request){
        try{
            $ip = $this->getIpAddr();
            $wishList = WishList::where('estate_id', $request->estate_id)->where('ip_addr', $ip)->first();

            if($wishList){
                $wishList->delete();

                return $this->jsonResponse('0000', __('Uspješno obrisano'), [
                    'action' => 'delete'
                ]);
            }else{
                WishList::create([
                    'estate_id' => $request->estate_id,
                    'ip_addr' => $ip
                ]);

                return $this->jsonResponse('0000', __('Uspješno dodano'), [
                    'action' => 'add'
                ]);
            }
        }catch (\Exception $e){ }
    }
}
