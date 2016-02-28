<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TUserExt extends Model {

    /**
     * Generated
     */

    protected $table = 't_user_ext';
    protected $fillable = ['user_ext_id', 'user_ext_status_id', 'user_id', 'provider', 'provider_id_string', 'login_ext', 'first_name_ext', 'last_name_ext', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'user_ext_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'user_id', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
