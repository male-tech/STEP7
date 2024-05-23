<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';


    protected $fillable =
    [
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'image',
           
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    

    public function getList() {
        
        $product = DB::table('products')->get();

        return $product;
    }

    public function store(Request $request){

        $request->validate([
            'product_name'=>'required',
            'company_id'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'comment'=>'nullable',
            'image'=>'nullable|image',
        ]);

        $product = new Product([
                'product_name' => $request->get('product_name'),
                'company_id' => $request->get('company_id'),
                'price' => $request->get('price'),
                'stock' => $request->get('stock'),
                'comment' => $request->get('comment'),
            ]);

            
        }

}

