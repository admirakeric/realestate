<?php

namespace App\Models\Core;

use App\Models\Estates\Estate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EventVisit extends Model{
    use HasFactory;

    protected $table = 'events__visits';
    protected $guarded = ['id'];

    public function estateRel(): HasOne{
        return $this->hasOne(Estate::class, 'id', 'estate_id');
    }
}
