@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('新規登録が完了しました') }}
                </div>
                <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"
                                onclick="location.href='{{route('login')}}'">
                                    {{ __('ログイン画面へ') }}
                                </button>
                            </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
