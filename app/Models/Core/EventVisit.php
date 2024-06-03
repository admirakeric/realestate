<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventVisit extends Model{
    use HasFactory;

    protected $table = 'events__visits';
    protected $guarded = ['id'];
}
