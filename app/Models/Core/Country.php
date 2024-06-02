<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static pluck(string $string, string $string1)
 */
class Country extends Model{
    use HasFactory;

    protected $table = 'api__countries';
}
