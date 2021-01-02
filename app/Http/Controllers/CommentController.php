<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NotifyUser;

class CommentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Save a comment to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:300',
            'profileId' => 'required',
            'id' => 'required',
        ]);
        
        $comment = new Comment;
        $comment->comment = $validatedData['comment'];
        $comment->profile_id = $validatedData['profileId'];
        $comment->post_id = $validatedData['id'];
        $comment->save();

        $post = Post::find($validatedData['id']);
        $post->profile->user->notify(new NotifyUser($post));

        $comment['name'] =  $comment->profile->user->name;
        $comment['image'] = '/images/' . $comment->profile->profile_picture;
        return $comment;
    }

    /**
     * Get all of the comments of a post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apiShow($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;

        $comments = $comments->map(function ($comment) {
            $comment['name'] =  $comment->profile->user->name;
            $comment['image'] = '/images/' . $comment->profile->profile_picture;
            return $comment;
        });

        return $comments;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $userId = Auth::id();

        return view('comments.edit', ['userId' => $userId, 'comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:300',
        ]);

        $comment = Comment::where('id', $request->id)->first();
        
        $comment->comment = $validatedData['comment'];

        $comment->save();

        return redirect()->route('posts.show', ['id' => $comment->post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Comment::findOrFail($id)->post;

        Comment::findOrFail($id)->delete($id);
  
        return redirect()->route('posts.show', ['id' => $post->id]);
    }
}
