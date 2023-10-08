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
        return view('products.index', ['products' => $products]);
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

        $product = Products::create($validatedData);

        return redirect(route('products.index'))->with('success', 'Produit créé avec succès');
    }

    // Modifier un produit
    public function edit(Products $product) {
        return view('products.edit', ['product' => $product]);
    }

    // Mettre à jour un produit
    public function update(Products $product, Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $product->update($validatedData);

        return redirect(route('products.index'))->with('success', 'Produit mis à jour');
    }

    // Supprimer un produit
    public function destroy(Products $product) {
        $product->delete();

        return redirect(route('products.index'))->with('success', 'Produit supprimé');
    }

}
