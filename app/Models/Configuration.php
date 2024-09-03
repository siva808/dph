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
        'header_logo_one_title',
        'header_logo_two_title',
        'header_logo_three_title',
        'header_logo_four_title',
        'header_logo_five_title',
        'header_logo_six_title',
        'header_logo_one_status',
        'header_logo_two_status',
        'header_logo_three_status',
        'header_logo_four_status',
        'header_logo_five_status',
        'header_logo_six_status',
        'tamilnadu_government_title_tamil',
        'tamilnadu_government_title_english',
        'dph_full_form_tamil',
        'dph_full_form_english',
        'dph_address',
        'dph_zip_code',
        'dph_city',
        'dph_state',
        'dph_phone',
        'joint_director_email',
        'joint_director_phone'
       
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
