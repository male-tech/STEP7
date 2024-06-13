<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::create([
            'product_id'=>'3',
        ]);

        Sale::create([
            'product_id'=>'4',
        ]);

        Sale::create([
            'product_id'=>'5',
        ]);

        Sale::create([
            'product_id'=>'6',
        ]);


    }
}
