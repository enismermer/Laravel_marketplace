<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    // Afficher la liste des produits
    public function index() 
    {
        $products = Products::all();

        return view('products.index', compact('products'));
    }

    // Afficher un produit
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    // Créer un produit
    public function create() 
    {
        return view('products.create');
    }
    
    // Ajouter les règles de validation et stocker les données
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $product = new Products();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->save();

        return redirect('/products')->with('success', 'Produit créé avec succès');
    }

}
