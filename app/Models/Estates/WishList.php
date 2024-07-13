<?php

namespace App\Models\Estates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, mixed $id)
 */
class WishList extends Model{
    use HasFactory;

    protected $table = 'estates__wishlist';
    protected $guarded = ['id'];
}
