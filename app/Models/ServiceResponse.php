<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TServiceResponse extends Model {

    /**
     * Generated
     */

    protected $table = 't_service_response';
    protected $fillable = ['service_response_id', 'service_response_status_id', 'service_request_id', 'party_id', 'review_id', 'response_title', 'response_text', 'price', 'rental_car_flag', 'courtesy_car_flag', 'next_appointment_date', 'repair_days', 'estimate_expiration_date', 'estimate_accurancy_flag', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tServiceRequest() {
        return $this->belongsTo(\App\Models\TServiceRequest::class, 'service_request_id', 'service_request_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'service_response_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tReview() {
        return $this->belongsTo(\App\Models\TReview::class, 'review_id', 'review_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tEmails() {
        return $this->hasMany(\App\Models\TEmail::class, 'service_response_id', 'service_response_id');
    }


}
