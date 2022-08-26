<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $casts = [
        'galery' => 'array',
    ];

    protected $dates = ['date'];
    protected $guarded = [];
}
