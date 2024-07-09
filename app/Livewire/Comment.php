<?php

namespace App\Livewire;

use App\Livewire\Forms\ReplyForm;
use Livewire\Component;
use App\Models\Comment as CommentModel;

class Comment extends Component
{
    public CommentModel $comment;

    public $isReplying = false, $isEditing = false;

    public ReplyForm $replyForm;

    public function storeReply()
    {
        $this->replyForm->storeReply($this->comment);

        $this->isReplying = false;
    }
    
    public function render()
    {
        return view('livewire.comment');
    }
}