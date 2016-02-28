<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TManufacturerPartyRel extends Model {

    /**
     * Generated
     */

    protected $table = 't_manufacturer_party_rel';
    protected $fillable = ['manufacturer_party_rel_id', 'manufacturer_party_rel_status_id', 'manufacturer_party_rel_type_id', 'manufacturer_id', 'party_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'manufacturer_party_rel_type_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'manufacturer_party_rel_status_id', 'lov_id');
    }

    public function tManufacturer() {
        return $this->belongsTo(\App\Models\TManufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
