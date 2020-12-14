<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class VerifyProfilePosts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $userId = Auth::id();
        $post = Post::findOrFail($request->id);

        if ((int)$post->profile->user->id === $userId) {
            return $next($request);
        } else {
            return redirect()->route('posts.index');
        }
    }
}
