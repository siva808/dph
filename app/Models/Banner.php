<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{


    protected $fillable = [
        'order_id',
        'banner_title',
        'banner_images', // Store image paths as JSON
        'status',
    ];
}
