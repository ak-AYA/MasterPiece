<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    // Display list of categories
    public function index()
    {
        $categories = Category::paginate(10);  // Paginate categories
        return view('admin.categories.index', compact('categories'));
    }

    // Store a new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        $imagePath = null;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category added successfully.');
    }

    // Update category details
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        $category = Category::findOrFail($request->id);

        // Handle image update
        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        // Update category details
        $category->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function delete($id)
    {
        $category = Category::findOrFail($id);

        // Delete the associated image if it exists
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }

    // Toggle category status
    public function toggleStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;  // Toggle the status
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category status updated.');
    }
}
