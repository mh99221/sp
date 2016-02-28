<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TServiceHistory extends Model {

    /**
     * Generated
     */

    protected $table = 't_service_history';
    protected $fillable = ['service_history_id', 'service_history_status_id', 'vehicle_id', 'service_party_id', 'total_price', 'parts_price', 'work_price', 'mileage', 'service_descr', 'service_date', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'service_party_id', 'party_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'service_history_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tVehicle() {
        return $this->belongsTo(\App\Models\TVehicle::class, 'vehicle_id', 'vehicle_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tServiceHistoryItems() {
        return $this->hasMany(\App\Models\TServiceHistoryItem::class, 'service_history_id', 'service_history_id');
    }


}
