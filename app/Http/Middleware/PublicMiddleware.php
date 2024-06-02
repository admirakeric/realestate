<?php

namespace App\Http\Middleware;

use App\Models\Core\Keyword;
use App\Models\Estates\Estate;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $searchedEstate = new Estate();

        $searchedEstate->title        = trim($request->get('title'));
        $searchedEstate->category     = trim($request->get('category'));
        $searchedEstate->purpose      = trim($request->get('purpose'));
        $searchedEstate->city         = trim($request->get('city'));
        $searchedEstate->sponsored    = trim($request->get('sponsored'));
        $searchedEstate->surface_from = trim($request->get('surface_from'));
        $searchedEstate->surface_to   = trim($request->get('surface_to'));
        $searchedEstate->id           = trim($request->get('id'));


        view()->share([
            'categories' => Keyword::where('keyword', 'estate__type')->orderBy('value')->pluck('value', 'id')->prepend('Sve nekretnine', ''),
            'purposes' => Keyword::where('keyword', 'estate_purpose')->orderBy('value')->pluck('value', 'id')->prepend('Svrha', ''),
            'cities' => Keyword::where('keyword', 'cities')->orderBy('value')->pluck('value', 'id')->prepend('Odaberite grad'),
            'sponsored' => Keyword::where('keyword', 'da_ne')->pluck('value', 'id')->prepend('Izdvojene nekretnine', ''),
            'searchedEstate' => $searchedEstate
        ]);

        return $next($request);
    }
}
