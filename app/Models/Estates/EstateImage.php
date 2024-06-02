<?php

namespace App\Models\Estates;

use App\Models\Core\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstateImage extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'estates__images';
    protected $guarded = ['id'];

    public function fileRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image');
    }
}
