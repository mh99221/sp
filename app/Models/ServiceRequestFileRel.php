<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TServiceRequestFileRel extends Model {

    /**
     * Generated
     */

    protected $table = 't_service_request_file_rel';
    protected $fillable = ['service_request_file_rel_id', 'service_request_file_rel_status_id', 'service_request_id', 'file_id', 'order_pos', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tServiceRequest() {
        return $this->belongsTo(\App\Models\TServiceRequest::class, 'service_request_id', 'service_request_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'service_request_file_rel_status_id', 'lov_id');
    }

    public function tFile() {
        return $this->belongsTo(\App\Models\TFile::class, 'file_id', 'file_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
