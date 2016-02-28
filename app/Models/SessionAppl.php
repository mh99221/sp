<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TSessionAppl extends Model {

    /**
     * Generated
     */

    protected $table = 't_session_appl';
    protected $fillable = ['session_id', 'modified', 'lifetime', 'data'];



}
