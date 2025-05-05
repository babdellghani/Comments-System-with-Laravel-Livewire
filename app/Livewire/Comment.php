<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\Like;
use App\Livewire\Forms\ReplyForm;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment as CommentModel;
use App\Livewire\Forms\UpdateCommentForm;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Comment extends Component
{
    use AuthorizesRequests;

    protected $listeners = [
        'deleteComment' => 'refresh',
    ];

    public CommentModel $comment;
    public $nestingLevel = 0;

    public $isReplying = false, $isEditing = false;

    public ReplyForm $replyForm;
    public UpdateCommentForm $updateForm;
    public Like $addLikeForm;

    public function mount()
    {
        $this->updateForm->body = $this->comment->body;
    }

    public function storeReply()
    {
        $this->authorize('create', $this->comment);
        $this->replyForm->storeReply($this->comment);
        $this->isReplying = false;
    }

    public function updateComment()
    {
        $this->authorize('update', $this->comment);
        $this->updateForm->updateComment($this->comment);
        $this->isEditing = false;
        $this->mount();
        session()->flash('message', 'Comment updated successfully.');
    }

    public function likeComment()
    {
        // if guest return to login
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->addLikeForm->like($this->comment->id);
    }

    public function countAllReplies($comment = null)
    {
        $comment = $comment ?? $this->comment;
        return $comment->countAllNestedReplies();
    }

    public function shouldShowMoreButton()
    {
        return $this->countAllReplies() > 3;
    }

    public function getReplyLimit()
    {
        return $this->shouldShowMoreButton() ? 2 : $this->comment->replies->count();
    }

    public function render()
    {
        return view('livewire.comments.comment');
    }
}

