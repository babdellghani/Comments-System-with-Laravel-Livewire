<?php

namespace App\Livewire\Forms;

use App\Models\Like as ModelsLike;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Like extends Form
{
    #[Validate('required', 'integer')]
    public $comment_id;

    public function like(int $comment_id)
    {
        $this->comment_id = $comment_id;
        $this->validate();

        $existingLike = ModelsLike::where('user_id', Auth::id())
            ->where('comment_id', $this->comment_id)
            ->first();

        if ($existingLike) {
            // If the like exists, delete it (unlike)
            $existingLike->delete();
        } else {
            // If the like doesn't exist, create a new one
            ModelsLike::create([
                'user_id' => Auth::id(),
                'comment_id' => $this->comment_id,
            ]);
        }
    }
}
