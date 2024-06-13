<!DOCTYPE html>
@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class="container">
    <h1>商品情報一覧</h1>
    
    <div class='search mt-5'>
        <form id="serch-form" method="GET" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-sm-12 col-md-3">
            <input type="text" name="search" class="form-control product-form" placeholder="検索キーワード" value="{{ request('search') }}">
        </div>
        <div class="col-sm-12 col-md-3">
            <select name="company_id" class="form-select product-form" value="{{ request('company_id')}}">
            <option selected disabled>メーカー名</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 col-md-3">
            <input type="number" name="min_price" class="form-control product-form" placeholder="最小価格" value="{{ request('min_price') }}">
        </div>
        <div class="col-sm-12 col-md-3">
            <input type="number" name="max_price" class="form-control product-form" placeholder="最大価格" value="{{ request('max_price') }}">
        </div>
        <div class="col-sm-12 col-md-3">
            <input type="number" name="min_stock" class="form-control product-form" placeholder="最小在庫" value="{{ request('min_stock') }}">
        </div>
        <div class="col-sm-12 col-md-3">
            <input type="number" name="max_stock" class="form-control product-form" placeholder="最大在庫" value="{{ request('max_stock') }}">
        </div>
        <div class="col-sm-12 col-md-1">
            <button id="search-button" class="btn btn-outline-secondary" type="submit">検索</button>
        </div>
        </form>
        <div class="search-results"></div>
    </div>

    <div class="products mt-5">
        <table>
            <thead>
                <tr>
                    <th>ID
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'id', 'direction' => 'asc']) }}">↑</a>
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'id', 'direction' => 'desc']) }}">↓</a>
                    </th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'price', 'direction' => 'asc']) }}">↑</a>
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'price', 'direction' => 'desc']) }}">↓</a>
                    </th>
                    <th>在庫数
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'stock', 'direction' => 'asc']) }}">↑</a>
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'stock', 'direction' => 'desc']) }}">↓</a>
                    </th>
                    <th>メーカー名</th>
                    <th><a href="{{ route('product.create') }}" class="btn btn-primary mb-3">新規登録</a></th>
                </tr>
            </thead>
            <tbody id="products-tbody">
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="{{ asset('/storage/' . $product->image) }}" alt="商品画像" width="100"></td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->company->company_name}}</td>
                    <td><a href="/show/{{$product->id}}" class="btn btn-info btn-sm mx-1">詳細</a>
                    <form id="delete-form" method="POST" action="{{ route('product.destroy',['id'=>$product->id]) }}" 
                    class="d-inline" >
                            @csrf
                            @method('POST')
                            <button id="delete-button" type="submit" class="btn btn-danger btn-sm mx-1" onclick="return checkDelete()">削除</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>

<script src="{{ asset('js/product.js') }}"></script>
@endsection