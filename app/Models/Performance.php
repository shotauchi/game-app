<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable = [
        'console_id',
        'GPU',
        'CPU',
    ];
}
