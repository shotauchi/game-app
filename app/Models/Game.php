<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'performance_id', // 追加
        'image',
        'URL',            // 実際のカラム名に合わせる
        'site',
        'introduction',
    ];

}