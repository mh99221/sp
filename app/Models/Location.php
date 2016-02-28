<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TLocation extends Model {

    /**
     * Generated
     */

    protected $table = 't_location';
    protected $fillable = ['location_id', 'parent_location_id', 'location_status_id', 'location_type_id', 'location', 'location_sk', 'location_cz', 'location_url', 'zip', 'gps_latitude', 'gps_longitude', 'google_maps_link', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'location_status_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'location_type_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tLocation() {
        return $this->belongsTo(\App\Models\TLocation::class, 'parent_location_id', 'location_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tAddresses() {
        return $this->hasMany(\App\Models\TAddress::class, 'city_id', 'location_id');
    }

    public function tAddresses() {
        return $this->hasMany(\App\Models\TAddress::class, 'city_part_id', 'location_id');
    }

    public function tAddresses() {
        return $this->hasMany(\App\Models\TAddress::class, 'country_id', 'location_id');
    }

    public function tAddresses() {
        return $this->hasMany(\App\Models\TAddress::class, 'district_id', 'location_id');
    }

    public function tAddresses() {
        return $this->hasMany(\App\Models\TAddress::class, 'region_id', 'location_id');
    }

    public function tCategoryLocationPartyRels() {
        return $this->hasMany(\App\Models\TCategoryLocationPartyRel::class, 'location_id', 'location_id');
    }

    public function tCategoryLocationStats() {
        return $this->hasMany(\App\Models\TCategoryLocationStat::class, 'location_id', 'location_id');
    }

    public function tLocations() {
        return $this->hasMany(\App\Models\TLocation::class, 'parent_location_id', 'location_id');
    }


}
