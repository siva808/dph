<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class HealthWalkLocation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['district_id', 'contact_number', 'address', 'location_url','status'];

    public static function getLocationData($isActive = false) {

        $data =  District::select('districts.id as district_id','districts.name as district_name','health_walk_locations.id as hw_id','health_walk_locations.contact_number','health_walk_locations.address','health_walk_locations.location_url','health_walk_locations.status')
            ->leftjoin('health_walk_locations','health_walk_locations.district_id','=','districts.id')
            ->where('districts.status',_active())
            ->orderBy('districts.name');

        if($isActive) {
            $data->where('health_walk_locations.status',_active());
        }

        return $data->get();
    }
}
