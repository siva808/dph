<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{


    protected $fillable = [
        'order_id',
        'image',// if using json field 
        'status',
    ];
}
