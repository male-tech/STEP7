<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable =
    [
        'product_name',
        'price',
        'stock',
        'company_name',
        'comment',
        'image',
           
    ];
    

    public function getList() {
        
        $product = DB::table('products')->get();

        return $product;
    }

    public function store(Request $request){

        $request->validate([
            'product_name'=>'required',
            'company_name'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'comment'=>'nullable',
            'image'=>'nullable|image',
        ]);

        $product = new Product([
                'product_name' => $request->get('product_name'),
                'company_name' => $request->get('company_name'),
                'price' => $request->get('price'),
                'stock' => $request->get('stock'),
                'comment' => $request->get('comment'),
            ]);

            
        }

}

