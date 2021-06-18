<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    
    public function index() {
        $categories = Categories::all();

        return view('categories', [
            'categories' => $categories
        ]);
    }

    public function create() {
        return view('categories-create');
    }

    public function editPage($id) {
        $category = Categories::find($id);

        return view('categories-edit', [
            'category' => $category
        ]);
    }

    public function store(Request $request) {
        $newCategory = $request->all();

        Categories::create($newCategory);

        return redirect(route('categories'));
    }

    public function edit(Request $request, $id) {
        $category = Categories::find($id);

        $category->name = $request->get('name');
        $category->save();

        return redirect(route('categories'));
    }

    public function delete($id) {
        $category = Categories::find($id);

        $category->delete();

        return redirect(route('categories'));
    }
}
