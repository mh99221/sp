<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TContact extends Model {

    /**
     * Generated
     */

    protected $table = 't_contact';
    protected $fillable = ['contact_id', 'contact_type_id', 'contact_status_id', 'department_code_combi', 'party_id', 'contact_value', 'primary_flag', 'note', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'contact_type_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'contact_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
