<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TFileLabelRel extends Model {

    /**
     * Generated
     */

    protected $table = 't_file_label_rel';
    protected $fillable = ['file_label_rel_id', 'file_label_rel_status_id', 'label_id', 'file_id', 'order_pos', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tLabel() {
        return $this->belongsTo(\App\Models\TLabel::class, 'label_id', 'label_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tFile() {
        return $this->belongsTo(\App\Models\TFile::class, 'file_id', 'file_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'file_label_rel_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
