<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TVehicleType extends Model {

    /**
     * Generated
     */

    protected $table = 't_vehicle_type';
    protected $fillable = ['vehicle_type_id', 'vehicle_type_status_id', 'vehicle_model_id', 'vehicle_type_name', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tVehicleModel() {
        return $this->belongsTo(\App\Models\TVehicleModel::class, 'vehicle_model_id', 'vehicle_model_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'vehicle_type_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tServiceRequests() {
        return $this->hasMany(\App\Models\TServiceRequest::class, 'vehicle_type_id', 'vehicle_type_id');
    }

    public function tVehicles() {
        return $this->hasMany(\App\Models\TVehicle::class, 'vehicle_type_id', 'vehicle_type_id');
    }


}
