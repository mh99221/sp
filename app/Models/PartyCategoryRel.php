<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPartyCategoryRel extends Model {

    /**
     * Generated
     */

    protected $table = 't_party_category_rel';
    protected $fillable = ['party_category_rel_id', 'party_category_rel_status_id', 'party_id', 'category_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tCategory() {
        return $this->belongsTo(\App\Models\TCategory::class, 'category_id', 'category_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'party_category_rel_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
