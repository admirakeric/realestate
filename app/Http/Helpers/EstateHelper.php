<?php

/* Functions used in filters (help with it) */

use App\Models\Estates\Estate;

Class EstateHelper{
    protected static array $_weekDays = ['Ned', 'Pon', 'Uto', 'Sri', 'Čet', 'Pet', 'Sub'];
    protected static array $_months = ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'];
    protected static function getName($total): string{
        $name  = "NEKRETNINA";

        if($total == 1) $name = "NEKRETNINA";
        else if($total == 2) $name = "NEKRETNINE";
        /* ToDo - Admirica */

        return $total . " " . $name;
    }
    public static function categoryCount($category): string{
        $total = Estate::where('category', $category)->count();
        return self::getName($total);
    }
    public static function cityCount($city): string{
        $total = Estate::where('city', $city)->count();
        return self::getName($total);
    }

    public static function weekDay($day){
        return self::$_weekDays[$day];
    }
    public static function month($month){
        return self::$_months[$month - 1];
    }
}
