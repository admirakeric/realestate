<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model{
    use HasFactory;

    protected $table = 'events';
    protected $guarded = ['id'];

    public function visitRel(){
        return $this->hasOne(EventVisit::class, 'event_id', 'id');
    }
}
