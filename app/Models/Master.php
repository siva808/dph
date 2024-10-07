<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = ['name','master_type_id','status'];

    public static function getMasterData() {
        return static::where('status',_active())->get();
    }
    public static function getLanguagesData() {
        return static::where('status',_active())->where('master_type_id', 1)->pluck('name', 'id');
    }
    public static function getPublicationsData() {
        return static::where('status',_active())->where('master_type_id', 2)->pluck('name', 'id');
    }
    public static function getNotifacationsData() {
        return static::where('status',_active())->where('master_type_id', 3)->pluck('name', 'id');
    }


}
