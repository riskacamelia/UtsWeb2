<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|unique:products',
            'nama_barang' => 'required',
            'harga' => 'required|integer',
            'satuan' => 'required',
        ]);

        Products::create($validatedData);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function edit(Products $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Products $product)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|unique:products,kode_barang,' . $product->id,
            'nama_barang' => 'required',
            'harga' => 'required|integer',
            'satuan' => 'required',
        ]);

        $product->update($validatedData);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
}