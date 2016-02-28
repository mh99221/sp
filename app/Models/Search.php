<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TSearch extends Model {

    /**
     * Generated
     */

    protected $table = 't_search';
    protected $fillable = ['search_id', 'search_status_id', 'search_string', 'result_count', 'created_by'];


    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'search_status_id', 'lov_id');
    }


}
