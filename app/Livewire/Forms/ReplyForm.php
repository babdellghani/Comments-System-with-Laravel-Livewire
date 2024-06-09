<?php

namespace App\Livewire\Forms;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ReplyForm extends Form
{
    #[Validate('required', 'string', 'max:255', message: 'Please enter a reply.')]
    public $body;
        
    public function storeReply(Comment $comment)
    {
        $this->validate();
        
        $reply = $comment->replies()->make([
            'body' => $this->body,
            'user_id' => Auth::id(),
        ]);
        
        $reply->commentable()->associate($comment->commentable);

        $reply->save();
        
        $this->reset('body');
    }
}