<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'image',
        'news_title',
        'news_content',
        'news_date',
        'news_author',
    ];

    
}
