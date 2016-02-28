<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TFile extends Model {

    /**
     * Generated
     */

    protected $table = 't_file';
    protected $fillable = ['file_id', 'file_status_id', 'file_type_id', 'party_id', 'file_descr', 'filename', 'original_filename', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'file_type_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'file_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tFileLabelRels() {
        return $this->hasMany(\App\Models\TFileLabelRel::class, 'file_id', 'file_id');
    }

    public function tServiceRequestFileRels() {
        return $this->hasMany(\App\Models\TServiceRequestFileRel::class, 'file_id', 'file_id');
    }


}
