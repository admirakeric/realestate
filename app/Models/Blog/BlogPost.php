<?php

namespace App\Models\Blog;

use App\Models\Core\File;
use App\Models\Core\Keyword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, string $string2)
 * @method static orderBy(string $string, string $string1)
 */
class BlogPost extends Model{
    use HasFactory;
    public array $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'];

    protected $table = 'blog';
    protected $guarded = ['id'];

    public function categoryRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'category');
    }
    public function createdByRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function imageRel() : HasOne{
        return $this->hasOne(File::class, 'id', 'image');
    }
    public function createdAt(): string{
        try{
            $date = Carbon::parse($this->updated_at);

            return $date->day . '. ' . $this->months[$date->month - 1] . ' ' . $date->year . ' u ' . $date->hour . ':' . $date->minute .'h';
        }catch (\Exception $e){ return ""; }
    }
}
