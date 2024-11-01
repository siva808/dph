<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{


    protected $fillable = [
        'order_id',
        'name',
        'qualification',
        'institution',
        'designation',
        'affiliation',
        'status',
    ];
}

