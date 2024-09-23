<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\CommentForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class Comments extends Component
{
    use AuthorizesRequests, WithPagination;

    public Model $model;
    
    public CommentForm $form;

    public function postComment()
    {
        $this->form->storeComment($this->model);
        $this->gotoPage(1);
    }

    #[On('deleteComment')]
    public function deleteComment(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
    }

    public function render()
    {
        return view('livewire.comments.comments', [
            'comments' => $this->model->comments()
                ->with(['user', 'likes'])
                ->with(['replies' => function ($query) {
                    $query->with(['user', 'likes', 'replies'])
                        ->latest()->paginate(3);
                }])
                ->parent()
                ->latest()
                ->paginate(3),
        ]);
    }
}