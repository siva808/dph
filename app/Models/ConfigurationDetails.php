<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigurationDetails extends Model
{
    protected $table = 'configuration_details';
	 protected $fillable = [
        'name',
        'link',
        'image_url',
        'status',
        'footer_logo_one',
        'configuration_content_type_id'
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

    public static function getConfigurationDetailsData() {

        $configuration = static::with([]);    
        return $configuration->orderBy('id','asc')->get();
    }
}
