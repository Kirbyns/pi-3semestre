<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index(){
        return view('product.index')->with('products',Product::all());
    }
    public function create(){
        return view ('product.create')->with('categories',Category::all());
    }

    public function store (Request $request){
        Product::create($request->all());
        session()->flash('sucess', 'Produto Criado com sucesso!');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product){
        $product->delete();
        session()->flash('sucess', 'Produto Deletado!');
        return redirect(route('product.index'));


    }
    public function edit(Product $product){
        return view('product.edit')->with('product',$product)->with('categories',Category::all()); //quando tiver dois with pode declarar assim tambem : with(['product' => $product, etc..])


    }
    public function update(Product $product, Request $request){
       $product->update($request->all());
       session()->flash('sucess', 'Produto editado com sucesso');
       return redirect(route('product.index'));


    }
    public function trash(){
        return view('product.trash')->with('products',Product::onlyTrashed()->get());
    }

    public function restore( $product_id){
        $product = Product::onlyTrashed()->where('id', $product_id)->first();
        $product->restore();
        session()->flash('sucess', 'Produto restaurado com sucesso');
        return redirect(route('product.index'));

}

}




