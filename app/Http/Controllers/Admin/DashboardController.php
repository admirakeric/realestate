<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Core\Event;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller{
    protected string $_path = 'admin.pages.';

    public function dashboard(): View{
        return view($this->_path . 'dashboard');
    }
    public function calendar(): View{
        return view($this->_path . 'dashboard.calendar');
    }
    public function monthContent(Request $request){
        try{
            $lastDay = Carbon::parse($request->year.'-'.$request->month.'-01')->daysInMonth;
            $period = CarbonPeriod::create($request->year.'-'.$request->month.'-01', $request->year.'-'.$request->month.'-'.$lastDay);

            $data = [];

            foreach ($period as $date) {
                if($date->dayOfWeek > 0 and $date->dayOfWeek < 6) {
                    $day = $date->format('Y-m-d');
                    $samples = Event::where('date', $day)->with('visitRel')->get();

                    foreach ($samples as $sample) $sample->cDate = Carbon::parse($sample->date)->format('d.m.Y');

                    $data[$date->format('Y-m-d')] = ($samples->count()) ? $samples->toArray() : [];
                }
            }

            return json_encode([
                'code' => '0000',
                'data' => $data
            ]);
        }catch (\Exception $e){}
    }

    public function dayContent(Request $request){
        try{
            $date = Carbon::parse($request->date);
            $samples = Event::where('date', $date->format('Y-m-d'))->with('visitRel.estateRel')->get();
            foreach ($samples as $sample) $sample->cDate = Carbon::parse($sample->date)->format('d.m.Y');

            return json_encode(['code' => '0000', 'data' => ($samples->count() ? $samples->toArray() : [])]);
        }catch(\Exception $e){}
    }
}
