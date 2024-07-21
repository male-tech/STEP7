<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;


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

    public function index(Request $request)
    {
        $products = $this->filterProducts($request);
        $companies = Company::all();

        return view('product', [
            'products' => $products,
            'companies' => $companies
        ]);
    }

    public function search(Request $request)
    {
        $products = $this->filterProducts($request);

        return response()->json($products);
    }

    private function filterProducts(Request $request)
    {
        $query = Product::query();

        if ($search = $request->input('search')) {
            $query->where('product_name', 'LIKE', "%{$search}%");
        }

        if ($company_id = $request->input('company_id')) {
            $query->where('company_id', $company_id);
        }

        if ($min_price = $request->input('min_price')) {
            $query->where('price', '>=', $min_price);
        }

        if ($max_price = $request->input('max_price')) {
            $query->where('price', '<=', $max_price);
        }

        if ($min_stock = $request->input('min_stock')) {
            $query->where('stock', '>=', $min_stock);
        }

        if ($max_stock = $request->input('max_stock')) {
            $query->where('stock', '<=', $max_stock);
        }

        return $query->with('company')->get();
    }

   

    //商品新規登録画面
    public function create(){

        $companies = Company::distinct()->get();
    
        return view('create', ['companies' => $companies]);
        
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
        $companies = Company::distinct()->get();

        return view('edit',
        ['product' => $product,
        'companies' => $companies]);

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
