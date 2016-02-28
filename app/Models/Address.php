<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TAddress extends Model {

    /**
     * Generated
     */

    protected $table = 't_address';
    protected $fillable = ['address_id', 'address_type_id', 'address_status_id', 'party_ID', 'line_1', 'line_2', 'line_3', 'city_id', 'city', 'city_part_id', 'city_part', 'zip', 'district_id', 'district', 'region_id', 'region', 'country_id', 'country', 'gps_latitude', 'gps_longitude', 'google_maps_link', 'primary_Flag', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_ID', 'party_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'address_status_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'address_type_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tLocation() {
        return $this->belongsTo(\App\Models\TLocation::class, 'city_id', 'location_id');
    }

    public function tLocation() {
        return $this->belongsTo(\App\Models\TLocation::class, 'city_part_id', 'location_id');
    }

    public function tLocation() {
        return $this->belongsTo(\App\Models\TLocation::class, 'country_id', 'location_id');
    }

    public function tLocation() {
        return $this->belongsTo(\App\Models\TLocation::class, 'district_id', 'location_id');
    }

    public function tLocation() {
        return $this->belongsTo(\App\Models\TLocation::class, 'region_id', 'location_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tServiceRequests() {
        return $this->hasMany(\App\Models\TServiceRequest::class, 'address_id', 'address_id');
    }


}
