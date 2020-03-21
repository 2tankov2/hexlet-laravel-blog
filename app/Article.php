<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name', 'body', 'state', 'category_id'];

    public function isPublished()
    {
        return $this->state == 'published';
    }

    public function category()
    {
        return $this->belongsTo(__NAMESPACE__ . '\ArticleCategory');
    }
}
