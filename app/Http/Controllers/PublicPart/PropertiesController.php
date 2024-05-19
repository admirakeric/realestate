<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertiesController extends Controller{
    protected string $_path = 'public-part.properties.';

    public function index(): View{
        return view($this->_path . 'index');
    }
    public function preview($slug): View{
        $days = CarbonPeriod::between( Carbon::now(), Carbon::now()->addDays(14));

        return view($this->_path . 'preview', [
            'days' => $days
        ]);
    }
}
