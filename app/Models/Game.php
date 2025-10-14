<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'performance_id', // 追加
        'image',
        'url',
        'site',
        'introduction',
    ];
    
    // サムネイルの公開 URL を返すアクセサ
    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            $basename = pathinfo($this->image, PATHINFO_FILENAME);
            $thumbPath = 'images/thumbnails/' . $basename . '.jpg';

            if (Storage::disk('public')->exists($thumbPath)) {
                // Storage::disk('public')->url は公開 URL (/storage/...) を返す
            return Storage::disk('public')->url($thumbPath);
            }
        }

        // デフォルト画像（public/images/no-image.png 等を用意しておく）
        return asset('images/no-image.png');
    }
}