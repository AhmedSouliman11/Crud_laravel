<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $postFromDB = Post::all(); //have all posts
        return view('posts.index' , ['posts' => $postFromDB]);
    }
    public function show(Post $post) { // (Post $post) and then $singlePost = $post ; [Route model binding]
       /* dd($post);
        $singlePost = Post::findOrFail($post); //First Method
        //$singlePost = Post::where('id' , $post)->first(); Second Method
        */
        return view('posts.show' , ['post' => $post]);
    }
    public function create() {
        //to create the user_id also and add the user
        $users = User::all();
        return view('posts.create' , ['users' => $users]);
    }
    public function store(Request $request) {
        //dd(request() , $request);
        //$data = request()->all();
        /*$title = request()->title ;
        $description = request()->description;*/
        //The Third Way
        $title = $request->title ;
        $description = $request->description;
        $userId = $request->user_id ; //store the user also
        $post = post::create([ // post::create([ 'column-name' : 'value' , 'column-name' : 'value'   ]) //Fill it into DB
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
        ]);
        return redirect(route('posts.index')); //Redirect to /posts / return redirect('/posts')
    }
    //Edit posts
    public function edit($post) {
        $users = User::all();
        $singlePost = Post::findOrFail($post);
        return view('posts.edit' , ['post' => $singlePost , 'users' => $users]);
    }
    public function update($post , Request $request) {
        $singlePost = Post::findOrFail($post);
        $singlePost->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);
        return redirect(route('posts.index'));
    }
    //Delete Posts
    public function destroy($post , Request $request) {
        //Post::where('id' , $post)->delete(); //Or in single query
        $singlePost = Post::findOrFail($post); //return the posts

        $singlePost->delete(); //delete the posts

        return redirect(route('posts.index'));
    }

}
/*
Mass assignment vulnerability
*/
