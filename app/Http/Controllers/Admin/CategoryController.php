<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private function ensureUploadDirectoryExists()
    {
        $uploadPath = public_path('uploads/categories');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        return $uploadPath;
    }

    public function index()
    {
        $mainCategories = Category::with(['subCategories.subSubCategories'])
            ->mainCategories()
            ->orderBy('sort_order')
            ->get();
        
        return view('admin.dashboard.category.index', compact('mainCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:1,2,3',
            'parent_id' => 'required_unless:level,1|nullable|exists:categories,id',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'level' => $request->level,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'is_active' => true
        ];

        if ($request->hasFile('icon_image')) {
            $uploadPath = $this->ensureUploadDirectoryExists();
            $image = $request->file('icon_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $filename);
            $data['icon_image'] = 'uploads/categories/' . $filename;
        }

        Category::create($data);

        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        if ($request->hasFile('icon_image')) {
            // Delete old image if exists
            if ($category->icon_image && file_exists(public_path($category->icon_image))) {
                unlink(public_path($category->icon_image));
            }

            $uploadPath = $this->ensureUploadDirectoryExists();
            $image = $request->file('icon_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $filename);
            $data['icon_image'] = 'uploads/categories/' . $filename;
        }

        $category->update($data);

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        // Delete icon image if exists
        if ($category->icon_image && file_exists(public_path($category->icon_image))) {
            unlink(public_path($category->icon_image));
        }
        
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
