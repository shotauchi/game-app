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
    
    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            $basename = pathinfo($this->image, PATHINFO_FILENAME);
            $thumbPath = 'images/thumbnails/' . $basename . '.jpg';
            if (Storage::disk('public')->exists($thumbPath)) {
                return Storage::disk('public')->url($thumbPath); // -> /storage/images/thumbnails/xxx.jpg
            }
        }
        return asset('images/no-image.png');
    }

}