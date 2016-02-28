<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPartyRel extends Model {

    /**
     * Generated
     */

    protected $table = 't_party_rel';
    protected $fillable = ['party_rel_id', 'party_rel_status_id', 'party_id', 'related_party_id', 'party_rel_type_id', 'related_party_function', 'department_code_combi', 'brands', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'party_rel_status_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'party_rel_type_id', 'lov_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'related_party_id', 'party_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
