<?php

namespace App\Models\Presenters;


use App\Models\User;
use App\Models\Comment;


class CommentPresenter
{
    public function __construct(public Comment $comment)
    {
        //
    }

    public function relativeCreatedAt()
    {
        return $this->comment->created_at->diffForHumans();
    }

    public function likedBy(User $user): bool
    {
        return $this->comment->likes->contains('user_id', $user->id);
    }
}