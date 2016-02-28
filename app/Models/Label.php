<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TLabel extends Model {

    /**
     * Generated
     */

    protected $table = 't_label';
    protected $fillable = ['label_id', 'label_status_id', 'party_id', 'label_name', 'label_descr', 'gallery_flag', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'label_status_id', 'lov_id');
    }

    public function tFileLabelRels() {
        return $this->hasMany(\App\Models\TFileLabelRel::class, 'label_id', 'label_id');
    }


}
