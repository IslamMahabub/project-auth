<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_name', 'profile_pic', 'dob', 'residence_location', 'current_location_staying_duration', 'abroad_staying_duration',
        'current_profession', 'designation', 'company_name', 'office_address', 'visa_status', 'passport_no', 'passport_valid',
        'contact_no', 'email'
    ];
}
