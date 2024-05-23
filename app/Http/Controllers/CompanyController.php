<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;


class CompanyController extends Controller
{
    //商品情報一覧画面
    public function company(){

        $companies = Company::all();

        return view('product',
        ['companies' => $companies]);
    }
}
