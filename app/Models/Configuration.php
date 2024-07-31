<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configurations';
	 protected $fillable = [
        'notification_content',
        'notification_status',
        'mini_banner_one',
        'mini_banner_two',
        'mini_banner_three',
        'mini_banner_one_title',
        'mini_banner_two_title',
        'homepage_banner_one_title',
        'homepage_banner_two_title',
        'homepage_banner_three_title',
        'homepage_banner_four_title',
        'homepage_banner_five_title',
        'homepage_banner_one',
        'homepage_banner_two',
        'homepage_banner_three',
        'homepage_banner_four',
        'homepage_banner_five',
        'homepage_banner_one_status',
        'homepage_banner_two_status',
        'homepage_banner_three_status',
        'homepage_banner_four_status',
        'homepage_banner_five_status',
        'mini_banner_one_status',
        'mini_banner_two_status',
        'header_logo_one',
        'header_logo_two',
        'header_logo_three',
        'header_logo_four',
        'header_logo_five',
        'header_logo_six',
       
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];

    public function getCreatedAtAttribute($date)
    {
        return convertUTCToLocal($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return convertUTCToLocal($date);
    }

    public static function getConfigurationData() {

        $configuration = static::with([]);    
        return $configuration->orderBy('id','asc')->get();
    }

    public static function getLatestConfig() {
        return static::latest()->first();   
    }

}
