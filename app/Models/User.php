<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Models\Tag;
use Hash;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username','password','user_type_id','contact_number','country_code','otp','last_otp_verified_at','status','section','designation','is_hud','hud_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function username()
{
    return 'email';
}

    public function getUserData($id) {

        return $this->with(['tag'])->find($id);

    }

    public function scopeFilter($query) {

         if($keyword = request('keyword')) {
             $query->where('name','like','%'.$keyword.'%');
             $query->orWhere('contact_number','like','%'.$keyword.'%');
             $query->orWhere('email','like','%'.$keyword.'%');
             $query->orWhere('designation','like','%'.$keyword.'%');
         }
         return $query;
     }


     public static function getQueriedResult() {

     	$page_length = getPagelength();

     	list($sortfield,$sorttype) = getSorting();

     	$result = static::with(['tag'])->whereIn('user_type_id',[_employeeUserTypeId(),_hudUserTypeId()])->filter();

     	$sortfield = ($sortfield == 'name')?'name':$sortfield;
     	$sortfield = ($sortfield == 'contact_number')?'contact_number':$sortfield;
     	$sortfield = ($sortfield == 'email')?'email':$sortfield;
        $sortfield = ($sortfield == 'designation')?'designation':$sortfield;

     	return $result->orderBy($sortfield,$sorttype)->paginate($page_length);
    }

    public function createHUDUser($hud_data) {

        $password = config('constant.default_user_password');
        $username = prepareUsername($hud_data->name.addTrialZero($hud_data->id));
        $input = [
                'name' => $hud_data->name,
                'username' => $username,
                'contact_number' => $hud_data->contact_number ?? null,
                'email' => $hud_data->email ?? null,
                'section' => $hud_data->section ?? '0',
                'designation' => $hud_data->designation ?? null,
                'country_code' => defaultCountryCode(),
                'user_type_id' => _hudUserTypeId(),
                'status' => $hud_data->status,
                'password' => Hash::make($password),
                'is_hud' => _active(),
                'hud_id' => $hud_data->id,
            ];
        return $this->create($input);
    }

    public function tag(){
        return $this->belongsTo(Tag::class,'section');
    }

}
