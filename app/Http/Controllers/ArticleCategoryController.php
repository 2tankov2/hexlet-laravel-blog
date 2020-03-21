<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ArticleCategory::paginate();

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new ArticleCategory();
        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:articles',
            'description' => 'required|min:20',
        ]);

        $category = new ArticleCategory();
        // Заполнение статьи данными из формы
        $category->fill($request->all());
        // При ошибках сохранения возникнет исключение
        $category->save();

        // Редирект на указанный маршрут с добавлением флеш-сообщения
        return redirect()->route('article_categories.index')->with('success','Category created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        $category = ArticleCategory::findOrFail($articleCategory->id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        $category = ArticleCategory::findOrFail($articleCategory->id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $category = ArticleCategory::findOrFail($articleCategory->id);
        $this->validate($request, [
        // У обновления немного изменённая валидация. В проверку уникальности добавляется название поля и id текущего объекта
        // Если этого не сделать, Laravel будет ругаться на то что имя уже существует
            'name' => 'required|unique:articles,name,' . $articleCategory->id,
            'body' => 'required|min:20',
        ]);

        $category->fill($request->all());
        $category->save();
        return redirect()
            ->route('article_categories.index')->with('success','Category update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $category = ArticleCategory::find($articleCategory->id);
        if ($category) {
            $category->delete();
        }
        return redirect()->route('article_categories.index');
    }
}
