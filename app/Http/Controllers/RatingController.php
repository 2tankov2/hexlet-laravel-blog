<?php

namespace App\Http\Controllers;

use App\Article;

class RatingController extends Controller
{
    public function index()
    {
        $allArticles = Article::all();
        $published = $allArticles->filter(function ($article) {
            return $article->isPublished();
        });
        $articles = $published->sortBy('likes_count');
        $articles->values()->all();
        return view('rating.index', ['articles' => $articles]);
    }
}
