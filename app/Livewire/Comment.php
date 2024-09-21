<?php

namespace App\Livewire;

use App\Livewire\Forms\Like;
use App\Livewire\Forms\ReplyForm;
use App\Livewire\Forms\UpdateCommentForm;
use App\Models\Comment as CommentModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Comment extends Component
{
    use AuthorizesRequests;

    protected $listeners = [
        'deleteComment' => 'refresh',
    ];

    public CommentModel $comment;

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
        $this->authorize('create');
        $this->replyForm->storeReply($this->comment);
        $this->isReplying = false;
    }

    public function updateComment()
    {
        $this->authorize('update', $this->comment);
        $this->updateForm->updateComment($this->comment);
        $this->isEditing = false;
        $this->mount();
    }

    public function likeComment()
    {
        $this->addLikeForm->like($this->comment->id);
    }

    public function render()
    {
        return view('livewire.comments.comment');
    }
}

