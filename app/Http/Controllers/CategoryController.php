<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /** Display a listing of the resource. */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $categories = Category::when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%");
        })->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('category.index', compact('categories', 'search'));
    }

    /** Show the form for creating a new resource. */
    public function create()
    {
        return view('category.create');
    }

    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255|unique:categories,nama',
        ]);

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dibuat.');
    }

    /** Show the form for editing the specified resource. */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255|unique:categories,nama,' . $category->id,
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diupdate.');
    }

    /** Remove the specified resource from storage. */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
