<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = ['name', 'description', 'state'];

    public function articles()
    {
        return $this->hasMany(__NAMESPACE__ . '\Article', 'category_id');
    }

    public function __toString()
    {
        return $this->name;
    }
}
