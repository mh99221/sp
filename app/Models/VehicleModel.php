<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TVehicleModel extends Model {

    /**
     * Generated
     */

    protected $table = 't_vehicle_model';
    protected $fillable = ['vehicle_model_id', 'manufacturer_id', 'vehicle_model_name', 'vehicle_model_status_id', 'production_start', 'production_end', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tManufacturer() {
        return $this->belongsTo(\App\Models\TManufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'vehicle_model_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tReviews() {
        return $this->hasMany(\App\Models\TReview::class, 'vehicle_model_id', 'vehicle_model_id');
    }

    public function tServiceRequests() {
        return $this->hasMany(\App\Models\TServiceRequest::class, 'vehicle_model_id', 'vehicle_model_id');
    }

    public function tVehicles() {
        return $this->hasMany(\App\Models\TVehicle::class, 'vehicle_model_id', 'vehicle_model_id');
    }

    public function tVehicleTypes() {
        return $this->hasMany(\App\Models\TVehicleType::class, 'vehicle_model_id', 'vehicle_model_id');
    }


}
