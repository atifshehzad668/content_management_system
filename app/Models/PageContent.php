<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page_name',
        'section_name',
        'title',
        'content',
        'image_path',
        'additional_data'
    ];

    protected $casts = [
        'additional_data' => 'array',
    ];

    public static function getContent($page, $section)
    {
        return self::where('page_name', $page)
            ->where('section_name', $section)
            ->first();
    }
}
