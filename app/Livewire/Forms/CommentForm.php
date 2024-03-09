<?php

namespace App\Livewire\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CommentForm extends Form
{
    #[Validate('required', 'string', 'max:255', message: 'Please enter a comment.')]
    public $body;
    
    public function storeComment(Model $model)
    {
        $this->validate();
        
        $model->comments()->create([
            'body' => $this->body,
            'user_id' => Auth::id(),
        ]);

        $this->reset('body');
    }
}