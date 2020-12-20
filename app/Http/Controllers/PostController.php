<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
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
        $request['data'] = json_decode($request['data']);

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'instructions' => 'required|max:5000',
            'cook_time' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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

        $ingredients = $request['data']->ingredients;

        foreach ($ingredients as $ing) {
            $ingredient = new Ingredient;
            $ingredient->ingredient = $ing[0];
            $ingredient->post_id = $post->id;
            $ingredient->save();
        }

        return redirect(RouteServiceProvider::HOME);
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

        if ($user === null) {
            $loggedIn = false;
            $profileId = null;
        } else {
            $profileId = $user->profile->id;
            $loggedIn = true;
        }
        return view('posts.show', ['post' => $post, 'profileId' => $profileId, 'loggedIn' => $loggedIn, 'ingredients' => $ingredients]);
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

        return view('posts.edit', ['post' => $post]);
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
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'ingredients' => 'required',
            'instructions' => 'required',
            'time_hours' => 'required',
            'time_mins' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $post = Post::where('id', $request->id)->first();
        
        $post->title = $validatedData['title'];
        $post->ingredients = $validatedData['ingredients'];
        $post->instructions = $validatedData['instructions'];
        $post->cook_time_hours = $validatedData['time_hours'];
        $post->cook_time_mins = $validatedData['time_mins'];

        $image = $validatedData['image'];
        $imageName = time().'.'.$image->extension();  
        $image->move(public_path('images'), $imageName);

        $post->image = $imageName;

        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id]);
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
