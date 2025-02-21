<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $products = Product::all(); // Obtiene todos los productos
        return view('products.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string|max:1000',
        ]);

        Product::create($request->all());

        return redirect()->route('products.create')->with('success', 'Precio de ponencia creado exitosamente.');
        
    }
        public function index()
        {
            $products = Product::all(); // Recupera todos los productos
            return view('products.create', compact('products'));
        }
    
        public function edit(Product $product)
        {
            return view('products.edit', compact('product'));
        }
    
        public function update(Request $request, Product $product)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'nullable|string|max:1000',
            ]);
    
            $product->update($request->all());
    
            return redirect()->route('products.create')->with('success', 'Precio de ponencia actualizado exitosamente.');
        }
    
        public function destroy(Product $product)
        {
            $product->delete();
    
            return redirect()->route('products.create')->with('success', 'Precio eliminado exitosamente.');
        }



    }
    


