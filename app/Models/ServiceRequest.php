<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TServiceRequest extends Model {

    /**
     * Generated
     */

    protected $table = 't_service_request';
    protected $fillable = ['service_request_id', 'service_request_status_id', 'address_id', 'manufacturer_id', 'vehicle_model_id', 'vehicle_type_id', 'vehicle_id', 'party_id', 'vin', 'registration_number', 'service_request_title', 'service_request_descr', 'max_price', 'max_distance', 'request_valid_to_date', 'courtesy_car_flag', 'insurance_flag', 'authorized_service_flag', 'spare_parts_type', 'manufactured_year', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tAddress() {
        return $this->belongsTo(\App\Models\TAddress::class, 'address_id', 'address_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'service_request_status_id', 'lov_id');
    }

    public function tVehicleType() {
        return $this->belongsTo(\App\Models\TVehicleType::class, 'vehicle_type_id', 'vehicle_type_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tManufacturer() {
        return $this->belongsTo(\App\Models\TManufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tVehicleModel() {
        return $this->belongsTo(\App\Models\TVehicleModel::class, 'vehicle_model_id', 'vehicle_model_id');
    }

    public function tVehicle() {
        return $this->belongsTo(\App\Models\TVehicle::class, 'vehicle_id', 'vehicle_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tEmails() {
        return $this->hasMany(\App\Models\TEmail::class, 'service_request_id', 'service_request_id');
    }

    public function tServiceRequestCategoryRels() {
        return $this->hasMany(\App\Models\TServiceRequestCategoryRel::class, 'service_request_id', 'service_request_id');
    }

    public function tServiceRequestFileRels() {
        return $this->hasMany(\App\Models\TServiceRequestFileRel::class, 'service_request_id', 'service_request_id');
    }

    public function tServiceResponses() {
        return $this->hasMany(\App\Models\TServiceResponse::class, 'service_request_id', 'service_request_id');
    }


}
