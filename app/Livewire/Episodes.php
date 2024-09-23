<?php

namespace App\Livewire;

use App\Models\Episode;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Episodes extends Component
{
    use WithPagination, AuthorizesRequests;


    public $title, $slug, $episode_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        return view('livewire.episodes.episodes', [
            'episodes' => Episode::latest()->paginate(3),
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->authorize('create', Episode::class);
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
        $this->episode_id = '';
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
            'required|unique:episodes,slug,' . $this->episode_id,
        ]);

        if ($this->episode_id) {
            $episode = Episode::findOrFail($this->episode_id);
            $this->authorize('update', $episode);
        } else {
            $this->authorize('create', Episode::class);
        }

        Episode::updateOrCreate(['id' => $this->episode_id], [
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'user_id' => Auth::id(),
        ]);

        session()->flash(
            'message',
            $this->episode_id ? 'Episode Updated Successfully.' : 'Episode Created Successfully.'
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
        $episode = Episode::findOrFail($id);
        $this->authorize('update', $episode);
        $this->episode_id = $id;
        $this->title = $episode->title;
        $this->slug = $episode->slug;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $episode = Episode::findOrFail($id);
        $this->authorize('delete', $episode);
        Episode::find($id)->delete();
        session()->flash('message', 'Episode Deleted Successfully.');
    }
}
