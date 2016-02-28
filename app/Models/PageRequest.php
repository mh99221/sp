<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPageRequest extends Model {

    /**
     * Generated
     */

    protected $table = 't_page_request';
    protected $fillable = ['page_request_id', 'session_id', 'url', 'requested', 'page_request_status_id', 'user_id'];


    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'page_request_status_id', 'lov_id');
    }


}
