<?php

namespace App\Models\Estates;

use App\Models\Core\Keyword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $slug)
 */
class Estate extends Model{
    use HasFactory, SoftDeletes;

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
    public function imagesRel() : HasMany{
        return $this->hasMany(EstateImage::class, 'estate_id', 'id');
    }
}
