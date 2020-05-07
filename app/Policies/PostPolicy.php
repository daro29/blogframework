<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function pass(User $user, Post $post)
    {
        // Esta función retorna falso o verdedaero, si retorna falso no deja pasar si retorna
        // verdaero deja pasar
        return $user->id == $post->user_id;
    }
}
