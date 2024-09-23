<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination, AuthorizesRequests;


    public $title, $slug, $article_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        return view('livewire.articles.articles', [
            'articles' => Article::latest()->paginate(3),
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->authorize('create', Article::class);
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->title = '';
        $this->article_id = '';
        $this->slug = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'slug' =>
            'required|unique:articles,slug,' . $this->article_id,
        ]);

        if ($this->article_id) {
            $article = Article::findOrFail($this->article_id);
            $this->authorize('update', $article);
        } else {
            $this->authorize('create', Article::class);
        }

        Article::updateOrCreate(['id' => $this->article_id], [
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'user_id' => Auth::id(),
        ]);

        session()->flash(
            'message',
            $this->article_id ? 'Article Updated Successfully.' : 'Article Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('update', $article);
        $this->article_id = $id;
        $this->title = $article->title;
        $this->slug = $article->slug;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('delete', $article);
        Article::find($id)->delete();
        session()->flash('message', 'Article Deleted Successfully.');
    }
}
