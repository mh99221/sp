<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TManufacturer extends Model {

    /**
     * Generated
     */

    protected $table = 't_manufacturer';
    protected $fillable = ['manufacturer_id', 'manufacturer_name', 'manufacturer_status_id', 'manufacturer_url', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'manufacturer_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tCategoryLocationPartyRels() {
        return $this->hasMany(\App\Models\TCategoryLocationPartyRel::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tCategoryLocationStats() {
        return $this->hasMany(\App\Models\TCategoryLocationStat::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tManufacturerPartyRels() {
        return $this->hasMany(\App\Models\TManufacturerPartyRel::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tReviews() {
        return $this->hasMany(\App\Models\TReview::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tServiceRequests() {
        return $this->hasMany(\App\Models\TServiceRequest::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tVehicles() {
        return $this->hasMany(\App\Models\TVehicle::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tVehicleModels() {
        return $this->hasMany(\App\Models\TVehicleModel::class, 'manufacturer_id', 'manufacturer_id');
    }


}
