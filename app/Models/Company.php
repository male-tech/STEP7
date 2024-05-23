<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [

        'company_name',
        'street_adress',
        'representative_name',

    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getList(){
        
        $company = DB::table('companies')->get();

        return $company;
    }

    public function store(Request $request){

        $request->validate([

            'company_name'=>'required',
    
        ]);

        $product = new Product([
                
                'company_name' => $request->get('company_name'),

            ]);

            
        }

    

}
