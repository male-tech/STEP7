<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;


class ProductsTableSeeder extends Seeder
{
    
    public function run()
    {
        Product::create([
            'product_name'=>'コーラ',
            'price'=>'130',
            'stock'=>'10',
            'company_name'=>'Coca-Cola',
            'image'=>'products/e8qlQ9TF5p7hYcXe9tB0clxKTyIj4On6uf0nsIJY.png',
        ]);

        Product::create([
            'product_name'=>'お茶',
            'price'=>'130',
            'stock'=>'6',
            'company_name'=>'伊藤園',
            'image'=>'products/q0pOMaKv2choo2XxZpH0sBoyT548Ua9xzyelZCC5.png',
        ]);

        Product::create([
            'product_name'=>'水',
            'price'=>'110',
            'stock'=>'8',
            'company_name'=>'キリン',
            'image'=>'products/e8qlQ9TF5p7hYcXe9tB0clxKTyIj4On6uf0nsIJY.png',
        ]);

        Product::create([
            'product_name'=>'オレンジジュース',
            'price'=>'150',
            'stock'=>'7',
            'company_name'=>'サントリー',
            'image'=>'products/q0pOMaKv2choo2XxZpH0sBoyT548Ua9xzyelZCC5.png',
        ]);
    }
}
