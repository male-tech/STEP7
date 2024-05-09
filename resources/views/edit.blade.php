<!DOCTYPE html>
@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class="container">
    <h1>商品情報編集画面</h1>

    <div>
    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" value="{{$product->id}}">
    <div class="mb-3">
            <label for="product_name" class="form-label">商品名*</label>
            <input id="product_name" type="text" name="product_name" class="form-control edit-form" 
            value="{{ $product->product_name }}" required>
        </div>

        <div class="mb-3">
            <label for="company=name" class="form-label">メーカー名*</label>
            <select id="company_name" name="company_name" class="form-select edit-form">
                <option selected disabled>"{{ $product->company_name }}"</option>
                <option>Coca-Cola</option>
                <option>伊藤園</option>
                <option>キリン</option>
                <option>サントリー</option>
            </select>          
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">価格*</label>
            <input id="price" type="text" name="price" class="form-control edit-form"
            value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">在庫数*</label>
            <input id="stock" type="text" name="stock" class="form-control edit-form" 
            value="{{ $product->stock }}"required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">コメント</label>
            <textarea id="comment" name="comment" class="form-control edit-form" 
            value="{{ $product->comment }}"></textarea>
        </div>
        <div>
            <label for="image" class="form-label">商品画像</label>
            <input id="image" type="file" name="image" class="form-control edit-form" >
        </div>
        <div class="edit-button">
            <button type="submit" class="btn btn-primary">更新</button>
            <a href="{{ route('product.index') }}" class="btn btn-primary">戻る</a>
        </div>
    </form>
    </div>
</div>
@endsection