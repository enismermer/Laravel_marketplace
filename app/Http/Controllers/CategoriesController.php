<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        // je prends toutes les infos de la table Category
        $categories = Categories::all();

        // je renvoie tous les infos dans : views/categories/index.blade.php
        return view('categories.index', ['categories' => $categories]);
    }
}
