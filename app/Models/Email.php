<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TEmail extends Model {

    /**
     * Generated
     */

    protected $table = 't_email';
    protected $fillable = ['email_id', 'email_status_id', 'sender_party_id', 'receiver_party_id', 'service_response_id', 'service_request_id', 'email_subject', 'email_body', 'sender_email', 'receiver_email', 'read_date', 'email_type_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'sender_party_id', 'party_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'receiver_party_id', 'party_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'email_status_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'email_type_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tServiceRequest() {
        return $this->belongsTo(\App\Models\TServiceRequest::class, 'service_request_id', 'service_request_id');
    }

    public function tServiceResponse() {
        return $this->belongsTo(\App\Models\TServiceResponse::class, 'service_response_id', 'service_response_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
