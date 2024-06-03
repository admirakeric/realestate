<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, $day)
 */
class Event extends Model{
    use HasFactory;

    protected $table = 'events';
    protected $guarded = ['id'];

    public function visitRel(): HasOne{
        return $this->hasOne(EventVisit::class, 'event_id', 'id');
    }
}
