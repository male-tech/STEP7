<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([

            'company_name'=>'Coca-Cola',
        ]);

        Company::create([

            'company_name'=>'伊藤園',
        ]);

        Company::create([

            'company_name'=>'キリン',
        ]);

        Company::create([

            'company_name'=>'サントリー',
        ]);
    }
}
