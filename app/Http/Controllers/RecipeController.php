<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->paginate(8);
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'ingredients'  => 'required|string',
            'instructions' => 'required|string',
            'duration'     => 'required|integer|min:1',
            'difficulty'   => 'required|in:Mudah,Sedang,Sulit',
            'servings'     => 'required|integer|min:1',
            'category'     => 'required|in:Makanan Berat,Camilan,Minuman,Dessert',
        ]);

        Recipe::create($validated);

        return redirect()->route('recipes.index')
            ->with('success', 'Resep berhasil ditambahkan!');
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'ingredients'  => 'required|string',
            'instructions' => 'required|string',
            'duration'     => 'required|integer|min:1',
            'difficulty'   => 'required|in:Mudah,Sedang,Sulit',
            'servings'     => 'required|integer|min:1',
            'category'     => 'required|in:Makanan Berat,Camilan,Minuman,Dessert',
        ]);

        $recipe->update($validated);

        return redirect()->route('recipes.index')
            ->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete;

        return redirect()->route('recipes.index')
            ->with('success', 'Resep berhasil dihapus!');
    }
}