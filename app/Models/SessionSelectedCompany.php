<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TSessionSelectedCompany extends Model {

    /**
     * Generated
     */

    protected $table = 't_session_selected_company';
    protected $fillable = ['session_selected_company_id', 'session_id', 'party_id', 'selection_type_id', 'start_timestamp', 'end_timestamp', 'active_flag'];



}
