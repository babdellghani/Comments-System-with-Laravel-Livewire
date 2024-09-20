<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
