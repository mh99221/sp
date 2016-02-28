<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class THour extends Model {

    /**
     * Generated
     */

    protected $table = 't_hour';
    protected $fillable = ['hour_id', 'hour_status_id', 'department_code_combi', 'party_id', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun', 'hld', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'hour_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
