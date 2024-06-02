<?php

namespace App\Models\SinglePages;

use App\Models\Core\File;
use App\Models\Core\Keyword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, int $int)
 */
class SinglePage extends Model{
    use HasFactory;

    protected $table = '__single_pages';
    protected $guarded = ['id'];

    public function categoryRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'category');
    }
    public function imageRel() : HasOne{
        return $this->hasOne(File::class, 'id', 'image');
    }
}
