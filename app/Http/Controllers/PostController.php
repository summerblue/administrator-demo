<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$posts = Post::paginate();
		return view('posts.index', compact('posts'));
	}

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

	public function create(Post $post)
	{
		return view('posts.create_and_edit', compact('post'));
	}

	public function store(PostRequest $request)
	{
		$post = Post::create($request->all());
		return redirect()->route('posts.show', $post->id)->with('message', 'Item created successfully.');
	}

	public function edit(Post $post)
	{
        $this->authorize('update', $post);
		return view('posts.create_and_edit', compact('post'));
	}

	public function update(PostRequest $request, Post $post)
	{
		$this->authorize('update', $post);
		$post->update($request->all());

		return redirect()->route('posts.show', $post->id)->with('message', 'Item updated successfully.');
	}

	public function destroy(Post $post)
	{
		$this->authorize('destroy', $post);
		$post->delete();

		return redirect()->route('posts.index')->with('message', 'Item deleted successfully.');
	}
}