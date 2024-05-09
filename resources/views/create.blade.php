<!DOCTYPE html>
@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class='container'>
    <h1 class='mb-4'>商品新規登録</h1>

    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data" >
        
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">商品名*</label>
            <input id="product_name" type="text" name="product_name" class="form-control create-form" required>
        </div>

        <div class="mb-3">
            <label for="company=name" class="form-label">メーカー名*</label>
            <select id="company_name" name="company_name" class="form-select create-form">
                <option selected disabled>メーカー名</option>
                <option>Coca-Cola</option>
                <option>伊藤園</option>
                <option>キリン</option>
                <option>サントリー</option>
            </select>          
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">価格*</label>
            <input id="price" type="text" name="price" class="form-control create-form" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">在庫数*</label>
            <input id="stock" type="text" name="stock" class="form-control create-form" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">コメント</label>
            <textarea id="comment" name="comment" class="form-control create-form" ></textarea>
        </div>
        <div>
            <label for="image" class="form-label">商品画像</label>
            <input id="image" type="file" name="image" class="form-control create-form" >
        </div>

        <div class="create-button">
            <button type="submit" class="btn btn-primary">登録</button>
            <a href="{{ route('product.index') }}" class="btn btn-primary">戻る</a>
        </div>
    </form>

</div>
@endsection