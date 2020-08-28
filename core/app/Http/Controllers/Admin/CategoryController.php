<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(15);
        return view('admin.category.allCategory',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name'=> $request->name
        ]);

        return back()->with('success','Category added successfully');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->update();

        return back()->with('success','Category updated successfully');
    }

    public function details($id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.category.details',compact('cat'));
    }
}
