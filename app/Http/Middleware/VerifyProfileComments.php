<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class VerifyProfileComments
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
        $user = Auth::user();
        $comment = Comment::findOrFail($request->id);

        if ((int)$comment->profile->user->id === $userId) {
            return $next($request);
        } else {
            return redirect()->route('posts.index');
        }
    }
}
