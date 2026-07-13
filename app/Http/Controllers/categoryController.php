<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories = Category::all();

        return view('admin.category.index', [
            'categories' => $categories,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCategory(Request $request)
    {
        $validate = $request->validate([

            'name' => ['required', 'min:4', 'max:30'],
            'slug' => ['required', 'min:4', 'max:30'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['min:10', 'max:255'],
        ]);
        $create = Category::create($validate);
        $featured_image = $request->file('featured_image');

        if ($featured_image) {
            $imageName = time().'.'.$featured_image->getClientOriginalExtension();
            $featured_image->move(public_path('images'), $imageName);
            $create->featured_image = $imageName;
            $create->save();
        }

        if ($create) {
            return redirect()->route('category.index')->with('success', 'Category created successfully.');
        } else {
            return back()->with('error', 'There is an error occured while creating category.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,'.$category->id,
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');

        if ($request->hasFile('featured_image')) {
            $featured_image = $request->file('featured_image');
            $imageName = time().'.'.$featured_image->getClientOriginalExtension();
            $featured_image->move(public_path('images'), $imageName);
            $category->featured_image = $imageName;
        }

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
