<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPartyTagRel extends Model {

    /**
     * Generated
     */

    protected $table = 't_party_tag_rel';
    protected $fillable = ['party_tag_rel_id', 'party_tag_rel_status_id', 'party_id', 'tag_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'party_tag_rel_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tTag() {
        return $this->belongsTo(\App\Models\TTag::class, 'tag_id', 'tag_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
