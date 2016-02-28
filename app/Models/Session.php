<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TSession extends Model {

    /**
     * Generated
     */

    protected $table = 't_session';
    protected $fillable = ['session_id', 'start_timestamp', 'end_timestamp', 'data', 'user_id', 'session_status_id', 'phpsessid'];



}
