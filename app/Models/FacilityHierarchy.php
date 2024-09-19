<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PHC;
use App\Models\hsc;
use App\Models\BLOCK;
use App\Models\STATE;
use App\Models\Country;
use App\Models\District;
use App\Models\HUD;
use App\Models\FacilityLevel;


class FacilityHierarchy extends Model
{
    protected $table = 'facility_hierarchy';

    protected $fillable = [
        'facility_name',
        'facility_code',
        'facility_level_id',
        'country_id',
        'state_id',
        'district_id',
        'hud_id',
        'block_id',
        'phc_id',
        'hsc_id',
    ];
    public function scopeFilter($query)
    {

        if ($keyword = request('keyword')) {
            $query->where('facility_name', 'like', '%' . $keyword . '%');
        }

        if ($facility_level_id = request('facility_level_id')) {
            $query->where('facility_level_id', $facility_level_id); // Added filter for facility_level_id
        }
        return $query;
    }

    public static function getQueriedResult()
    {
        $page_length = getPagelength();

        list($sortfield, $sorttype) = getSorting();
        // dd('hiiii');

        $result = static::with([])->filter();
        

        $sortfield = ($sortfield == 'name') ? 'name' : $sortfield;


        return $result->orderBy($sortfield, $sorttype)->paginate($page_length);
    }
    public function facility_level()
    {
        return $this->belongsTo(FacilityLevel::class, 'facility_level_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function hud()
    {
        return $this->belongsTo(Hud::class, 'hud_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function phc()
    {
        return $this->belongsTo(Phc::class, 'phc_id');
    }

    public function hsc()
    {
        return $this->belongsTo(Hsc::class, 'hsc_id');
    }
}
