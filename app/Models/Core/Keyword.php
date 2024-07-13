<?php

namespace App\Models\Core;

use App\Models\Blog\BlogPost;
use App\Models\Pages\Faq;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1)
 */
class Keyword extends Model{
    use HasFactory;
    use SoftDeletes;

    protected static $_keywords = [
        /* Questions keywords */
        'faq' => 'FAQ - Kategorije',
        'estate__type' => 'Vrsta nekretnina',
        'estate_purpose' => 'Svrha',
        'cities' => 'Gradovi',
        'da_ne' => 'Da / Ne',
        'blog_category' => 'Blog kategorija'
        // Should not be edited
        // 'page_type' => 'Vrsta stranice'
    ];

    protected $table = 'keywords';
    protected $guarded = ['id'];

    /* Return all types of keywords */
    public static function getKeywords(){ return self::$_keywords; }
    public static function getKeyword($key){ return self::$_keywords[$key]; }
    public static function getIt($key){ return Keyword::where('type', $key)->pluck('name', 'id'); }
    public static function getItByVal($key){ return Keyword::where('type', $key)->pluck('name', 'value'); }

    /**
     *  Reverse relationships
     */
    public function faqsRel(): HasMany{
        return $this->hasMany(Faq::class, 'category', 'id');
    }
    public function blogPostsRel(): HasMany{
        return $this->hasMany(BlogPost::class, 'category', 'id')->orderBy('id', 'DESC');
    }
}
