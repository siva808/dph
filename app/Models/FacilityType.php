<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PHC;


class FacilityType extends Model
{
    protected $table = 'facility_types';

     protected $fillable = [
        'name',
        'status',
        'phc_id',
        'image_url',
        'location_url'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];


    // Motters To Use Created To data Only
    public function getCreatedAtAttribute($date)
    {
        return convertUTCToLocal($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return convertUTCToLocal($date);
    }

    public function scopeFilter($query) {

        if($keyword = request('keyword')) {
            $query->where('name','like','%'.$keyword.'%');
        }

        if($phc_id = request('phc_id')) {
            $query->where('phc_id',$phc_id);
        }
        return $query;
    }

    public static function getQueriedResult() {

        $page_length = getPagelength();

        list($sortfield,$sorttype) = getSorting();

        $result = static::with([])->filter();

        if (isHud()){
            $block_ids = Block::getBlockId(auth()->user()->hud_id);
            $phc_ids = PHC::getPhcId($block_ids);
            $result = $result->whereIn('phc_id', $phc_ids);

        }

        $sortfield = ($sortfield == 'name')?'name':$sortfield;
        

        return $result->orderBy($sortfield,$sorttype)->paginate($page_length);
    }

    

    

    public function phc() {
        return $this->belongsTo(PHC::class);
    }

   


}
