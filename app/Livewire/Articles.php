<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;


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

        Article::updateOrCreate(['id' => $this->article_id], [
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
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
        Article::find($id)->delete();
        session()->flash('message', 'Article Deleted Successfully.');
    }
}
