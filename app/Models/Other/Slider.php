<?php

namespace App\Models\Other;

use App\Models\Core\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static get()
 */
class Slider extends Model{
    use HasFactory;

    protected $table = 'slider';
    protected $guarded = ['id'];

    public function desktopImgRel() : HasOne{
        return $this->hasOne(File::class, 'id', 'desktop_img');
    }
    public function mobileImgRel() : HasOne{
        return $this->hasOne(File::class, 'id', 'mobile_img');
    }
}
