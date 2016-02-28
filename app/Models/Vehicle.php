<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TVehicle extends Model {

    /**
     * Generated
     */

    protected $table = 't_vehicle';
    protected $fillable = ['vehicle_id', 'vehicle_status_id', 'manufacturer_id', 'vehicle_model_id', 'vehicle_type_id', 'vin', 'registration_number', 'manufactured_year', 'ec_valid_to_date', 'tc_valid_to_date', 'alert_ec_tc_id', 'alert_sms_number', 'alert_email', 'party_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'alert_ec_tc_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tVehicleModel() {
        return $this->belongsTo(\App\Models\TVehicleModel::class, 'vehicle_model_id', 'vehicle_model_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'vehicle_status_id', 'lov_id');
    }

    public function tVehicleType() {
        return $this->belongsTo(\App\Models\TVehicleType::class, 'vehicle_type_id', 'vehicle_type_id');
    }

    public function tManufacturer() {
        return $this->belongsTo(\App\Models\TManufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tReviews() {
        return $this->hasMany(\App\Models\TReview::class, 'vehicle_id', 'vehicle_id');
    }

    public function tServiceHistories() {
        return $this->hasMany(\App\Models\TServiceHistory::class, 'vehicle_id', 'vehicle_id');
    }

    public function tServiceRequests() {
        return $this->hasMany(\App\Models\TServiceRequest::class, 'vehicle_id', 'vehicle_id');
    }


}
