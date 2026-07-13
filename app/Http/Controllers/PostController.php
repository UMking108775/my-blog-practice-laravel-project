<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();

        return view('admin.post.index', compact('categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPost(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'featured_image' => $request->file('featured_image')->store('post_images', 'public'),
        ]);
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('post_images'), $imageName);
            $post->featured_image = $imageName;
        }
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $categories = Category::all();

        return view('admin.post.create', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:10',
            'description' => 'required|min:10',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        if ($request->hasFile('featured_image')) {

            // Delete old image
            if ($post->featured_image) {
                $oldImage = public_path('post_images/' . $post->featured_image);

                if (File::exists($oldImage)) {
                    File::delete($oldImage);
                }
            }

            // Upload new image
            $image = $request->file('featured_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('post_images'), $imageName);

            $post->featured_image = $imageName;
        }

        $post->save();

        return redirect()->route('post.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete image if it exists
        if ($post->featured_image) {
            $imagePath = public_path('post_images/' . $post->featured_image);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete post record
        $post->delete();

        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully.');
    }
}
