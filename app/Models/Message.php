<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TMessage extends Model {

    /**
     * Generated
     */

    protected $table = 't_message';
    protected $fillable = ['message_id', 'message_status_id', 'message_type_id', 'resource_type_id', 'resource_id', 'message_title', 'message_body', 'read_date', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'message_type_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'resource_type_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'message_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
