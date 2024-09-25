<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityLevel extends Model
{
    protected $table = 'facility_level';
    public $fillable = ['name'];

    public static function getFacilityLevelData(){
        return self::query()->skip(2)->take(PHP_INT_MAX)->get();
    }
}
