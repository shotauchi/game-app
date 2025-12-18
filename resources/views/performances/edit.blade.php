@extends('layouts.app')

@section('content')

<style>
        
    body {
        background-color: #b4ffb2; /* 背景色：薄い緑 */
        color: #28a745;           /* 文字色：濃いグレー */
    .label-CPU { color: blue; }
    .label-GPU { color: purple; }
    }
    
</style>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- 幅を短めに（12分割のうち6列分） -->
            <h1 class="text-center mb-4">パフォーマンス編集画面</h1>

            <div class="card">
                <div class="card-body">
                    <!-- 編集フォーム -->
                    <form action="{{ route('performances.update', $performance->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- PUTメソッドに変換（更新処理） -->
                
                        <div class="mb-3">
                            <label for="CPU" class="form-label label-CPU">CPU</label>
                            <input type="text" name="CPU" id="CPU" class="form-control" value="{{ old('CPU', $performance->CPU) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="GPU" class="form-label label-GPU">GPU</label>
                            <input type="text" name="GPU" id="GPU" class="form-control" value="{{ old('GPU', $performance->GPU) }}" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">更新する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
