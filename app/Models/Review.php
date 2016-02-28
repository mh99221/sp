<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TReview extends Model {

    /**
     * Generated
     */

    protected $table = 't_review';
    protected $fillable = ['review_id', 'review_status_id', 'party_id', 'review_value1', 'review_value2', 'review_value3', 'review_value4', 'overal_review_value', 'manufacturer_id', 'vehicle_model_id', 'vehicle_id', 'review_title', 'review_body', 'recommended_flag', 'visit_date', 'visited_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tVehicleModel() {
        return $this->belongsTo(\App\Models\TVehicleModel::class, 'vehicle_model_id', 'vehicle_model_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'review_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'visited_id', 'lov_id');
    }

    public function tManufacturer() {
        return $this->belongsTo(\App\Models\TManufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tVehicle() {
        return $this->belongsTo(\App\Models\TVehicle::class, 'vehicle_id', 'vehicle_id');
    }

    public function tComments() {
        return $this->hasMany(\App\Models\TComment::class, 'review_id', 'review_id');
    }

    public function tServiceResponses() {
        return $this->hasMany(\App\Models\TServiceResponse::class, 'review_id', 'review_id');
    }


}
