<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TTag extends Model {

    /**
     * Generated
     */

    protected $table = 't_tag';
    protected $fillable = ['tag_id', 'tag_status_id', 'tag_value', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'tag_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tPartyTagRels() {
        return $this->hasMany(\App\Models\TPartyTagRel::class, 'tag_id', 'tag_id');
    }


}
