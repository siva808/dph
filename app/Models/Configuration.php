<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configurations';
	 protected $fillable = [
        
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
        'joint_director_phone',
        'footer_gov_name_tamil'
       
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

    public static function getHeaderConfig() {
        return static::where('id', 2)->first();   
    }

}
