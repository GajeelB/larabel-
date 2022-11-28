<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function switchLike($post)
    {
        if ($post->checkLike(Auth::user())) {
            $post->likes()->where("user_id", Auth::user()->id)->delet();
        } else {
            if ($post->user()->id != Auth::user()->id)
            $post->likes()->create([
                "user_id" => Auth::user()->id,
            ]);
        }
        return back();
    }
}
