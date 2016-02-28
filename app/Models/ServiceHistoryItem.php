<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TServiceHistoryItem extends Model {

    /**
     * Generated
     */

    protected $table = 't_service_history_item';
    protected $fillable = ['service_history_item_id', 'service_history_item_status_id', 'service_history_id', 'item_name', 'item_descr', 'item_price', 'work_price', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tServiceHistory() {
        return $this->belongsTo(\App\Models\TServiceHistory::class, 'service_history_id', 'service_history_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'service_history_item_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
