<?php

namespace App\Models\Estates;

use App\Models\Core\Keyword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, mixed $id)
 */
class Feature extends Model{
    use HasFactory;

    protected $table = 'estates__features';
    protected $guarded = ['id'];

    public function keywordRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'feature_id');
    }
}
