<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $query = Product::with('category');

        if ($search) {
            $query->where('nama', 'like', "%{$search}%");
        }

        if ($category) {
            $query->where('category_id', $category);
        }

        $products = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        $categories = Category::orderBy('nama')->get();

        return view('product.index', compact('products', 'categories', 'search', 'category'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama')->get();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'harga' => 'nullable|numeric',
            'stok' => 'nullable|integer|min:0',
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil dibuat.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('nama')->get();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'harga' => 'nullable|numeric',
            'stok' => 'nullable|integer|min:0',
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
