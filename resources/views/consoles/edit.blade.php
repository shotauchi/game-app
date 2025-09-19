@extends('layouts.app')

@section('content')

<style>
        
        body {
        background-color: #ffe88b;
        color: #ff9b00;
    
    }
    
</style>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- 幅を短めに（12分割のうち6列分） -->
            <h1 class="text-center mb-4">編集画面一覧です。</h1>

            <div class="card">
                <div class="card-body">
                    <!-- 編集フォーム -->
                    <form action="{{ route('consoles.update', $console->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- PUTメソッドに変換（更新処理） -->
                
                        <div class="mb-3">
                            <label for="name" class="form-label">コンソール名</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $console->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="introduction" class="form-label">紹介文</label>
                            <textarea name="introduction" id="introduction" class="form-control" rows="5" required>{{ old('introduction', $console->introduction) }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                        <label for="Manufacturer" class="form-label">メーカー名</label>
                        <input type="text" name="Manufacturer" id="Manufacturer" class="form-control"
                           value="{{ old('Manufacturer', $console->Manufacturer) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="use" class="form-label">使用用途</label>
                            <input type="text" name="use" id="use" class="form-control"
                                   value="{{ old('use', $console->use) }}" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">更新する</button>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection
