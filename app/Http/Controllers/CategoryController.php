<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('category.index')->with('categories',Category::all());
    }
    public function create(){
        return view ('category.create');
    }

    public function store (Request $request){
        Category::create($request->all());
        session()->flash('sucess', 'Categoria Criado com sucesso!');
        return redirect(route('category.index'));
    }

    public function destroy(Category $category){
        $category->delete();
        session()->flash('sucess', 'Categoria Deletada!');
        return redirect(route('category.index'));


    }
    public function edit(category $category){
        return view('category.edit')->with('category',$category);


    }
    public function update(Category $category, Request $request){
       $category->update($request->all());
       session()->flash('sucess', 'Categoria editado com sucesso');
       return redirect(route('category.index'));


    }
}
