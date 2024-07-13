<?php

namespace App\Models\Estates;

use App\Models\Core\Country;
use App\Models\Core\File;
use App\Models\Core\Keyword;
use App\Traits\Http\HttpTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $slug)
 */
class Estate extends Model{
    use HasFactory, SoftDeletes, HttpTrait;

    public array $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'];

    protected $table = 'estates';
    protected $guarded = ['id'];

    public function categoryRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'category');
    }
    public function purposeRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'purpose');
    }
    public function cityRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'city');
    }
    public function countryRel(): HasOne{
        return $this->hasOne(Country::class, 'id', 'country');
    }
    public function imagesRel() : HasMany{
        return $this->hasMany(EstateImage::class, 'estate_id', 'id');
    }
    public function mainImageRel() : HasOne{
        return $this->hasOne(File::class, 'id', 'image');
    }
    public function getRealPrice(){
        return ((float) ((($this->sale_price) ? ($this->sale_price) : ($this->price))));
    }
    public function getPrice(): string{
        return number_format($this->getRealPrice(), 2, ',', '.');
    }
    public function pricePerSquareMeter(): string{
        if((float)$this->surface > 0) return number_format(((float)$this->getRealPrice() / (float)$this->surface), 2, ',', '.');
        else return '0.00';
    }

    public function updatedAt(): string{
        try{
            $date = Carbon::parse($this->updated_at);

            return $date->day . '. ' . $this->months[$date->month - 1] . ' ' . $date->year . ' u ' . $date->hour . ':' . $date->minute .'h';
        }catch (\Exception $e){ return ""; }
    }
    public function hasFeature($feature){
        return Feature::where('estate_id', '=', $this->id)->where('feature', '=', $feature)->count();
    }
    public function featuresRel(): HasMany{
        return $this->hasMany(Feature::class, 'estate_id', 'id');
    }
    public function inWishList(){
        return WishList::where('estate_id', '=', $this->id)->where('ip_addr', $this->getIpAddr())->count();
    }
}
