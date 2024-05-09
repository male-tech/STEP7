<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    //商品情報一覧画面
    public function showList() {

        $products = Product::all();
        
        return view('product',
        ['products' => $products]);
    }

    public function destroy($id){

        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');

    }

    public function index(Request $request){

        $query = Product::query();

        if($search = $request->search){
            $query->where("product_name", "LIKE", "%{$search}%");}

        if($company_name = $request->company_name){
            $query->where("company_name", "LIKE", "$company_name");}

            $products = $query->get();

        return view('product', 
        ['products' => $products]);
    }

    //商品新規登録画面
    public function create(){

        $products = Product::all();
        return view('create',
        ['products' => $products]);

        
    }

    public function store(Request $request){

        $input = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products','public');
            $input['image'] = $imagePath;
        }

        Product::create($input);

        return redirect()->route('product.create');

    }

    //商品詳細画面
    public function show($id){

        $product = Product::find($id);

        return view('show',
        ['product' => $product]);
    }

    //商品情報編集画面
    public function edit($id){

        $product = Product::find($id);

        return view('edit',
        ['product' => $product]);

    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $attributes = $request->all();
        $product->update($attributes);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        
        $attributes['image'] = $imagePath;
        
    }
    
    $product->update($attributes);
    
        return redirect()->route('product.show',['id' => $product->id]);
    }
}
