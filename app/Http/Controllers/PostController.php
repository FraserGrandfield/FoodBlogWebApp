<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all()->pagentat;
        // return view('posts.index', ['posts' => $posts]);
        return view('posts.index', ['posts' => DB::table('posts')->orderBy('created_at', 'desc')->paginate(5)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['ingredients'] = json_decode($request['ingredients']);
        $request['tags'] = json_decode($request['tags']);

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'instructions' => 'required|max:5000',
            'cook_time' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ingredients' => 'required',
        ]);
        $user = Auth::user();

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->instructions = $validatedData['instructions'];
        $post->profile_id = $user->profile->id;
        $post->cook_time = $validatedData['cook_time'];
        
        $image = $validatedData['image'];
        $imageName = time().'.'.$image->extension();  
        $image->move(public_path('images'), $imageName);

        $post->image = $imageName;

        $post->save();

        $ingredients = $request['ingredients']->ingredients;

        foreach ($ingredients as $ing) {
            $ingredient = new Ingredient;
            $ingredient->ingredient = $ing[0];
            $ingredient->post_id = $post->id;
            $ingredient->save();
            for ($x = 1; $x <= (count($ing) - 1); $x++) {
                $tag = Tag::where('name', $ing[$x])->first();
                $ingredient->tags()->attach($tag->id);
              }

        }

        $tags = $request['tags']->tags;

        foreach ($tags as $tag) { 
            $tag = Tag::where('name', $tag)->first();
            $post->tags()->attach($tag->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        $ingredients = $post->ingredients;

        $tags = $post->tags;
        $postTags = '';
        foreach ($tags as $tag) {
            $postTags = $postTags . $tag->name . ', ';
        }
        $postTags = rtrim($postTags, ", ");

        if ($user === null) {
            $loggedIn = false;
            $profileId = null;
        } else {
            $profileId = $user->profile->id;
            $loggedIn = true;
        }
        return view('posts.show', ['post' => $post, 'profileId' => $profileId, 'loggedIn' => $loggedIn, 'ingredients' => $ingredients, 'postTags' => $postTags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = $post->tags;

        $ingredientsIn = $post->ingredients;

        foreach ($ingredientsIn as $ingredient) {
            $tags = $ingredient->tags;
            $ingredient->push($tags);
        }

        return view('posts.edit', ['post' => $post, 'tags' => $tags, 'ingredientsIn' => $ingredientsIn]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['ingredients'] = json_decode($request['ingredients']);
        $request['tags'] = json_decode($request['tags']);
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'instructions' => 'required|max:5000',
            'cook_time' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ingredients' => 'required',
        ]);
        $user = Auth::user();
        $post = Post::where('id', $request->id)->first();
        $post->title = $validatedData['title'];
        $post->instructions = $validatedData['instructions'];
        $post->profile_id = $user->profile->id;
        $post->cook_time = $validatedData['cook_time'];
        
        if ($request->image !== null) {
            unlink(public_path() . '/images/' . $post->image);
            $image = $validatedData['image'];
            $imageName = time().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();
        
        $post->tags()->detach();
        DB::table('ingredients')->where('post_id', $request->id)->delete();

        $ingredients = $request['ingredients']->ingredients;
        foreach ($ingredients as $ing) {
            $ingredient = new Ingredient;
            $ingredient->ingredient = $ing[0];
            $ingredient->post_id = $post->id;
            $ingredient->save();
            for ($x = 1; $x <= (count($ing) - 1); $x++) {
                $tag = Tag::where('name', $ing[$x])->first();
                $ingredient->tags()->attach($tag->id);
              }

        }

        $tags = $request['tags']->tags;

        foreach ($tags as $tag) { 
            $tag = Tag::where('name', $tag)->first();
            $post->tags()->attach($tag->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
