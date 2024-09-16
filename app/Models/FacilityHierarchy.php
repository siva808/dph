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
