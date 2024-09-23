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
        session()->flash('message', 'Your comment has been posted successfully.');
    }

    #[On('deleteComment')]
    public function deleteComment(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        session()->flash('message', 'Your comment has been deleted successfully.');
    }

    public function render()
    {
        $comments = $this->model->comments()
            ->with(['user', 'likes', 'replies.user', 'replies.likes', 'replies.replies.user', 'replies.replies.likes'])
            ->parent()
            ->latest()
            ->paginate(10);

        return view('livewire.comments.comments', [
            'comments' => $comments,
        ]);
    }
}
