<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    protected $fillable=[
        'slug',
        'title',
        'image',
        'category_id',
        'user_id',
        'language_id',

        'description',
    ];

    public function language(){
        return $this->BelongsToMany(Language::class,'article_languages');
    }

    public function like(){
        return $this->hasMany(ArticleLike::class);
    }

    public function comment(){
        return $this->hasMany(ArticleComment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
