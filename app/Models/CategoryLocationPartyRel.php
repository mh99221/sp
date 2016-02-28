<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TCategoryLocationPartyRel extends Model {

    /**
     * Generated
     */

    protected $table = 't_category_location_party_rel';
    protected $fillable = ['category_id', 'location_id', 'party_id', 'manufacturer_id', 'increment_no', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tCategory() {
        return $this->belongsTo(\App\Models\TCategory::class, 'category_id', 'category_id');
    }

    public function tLocation() {
        return $this->belongsTo(\App\Models\TLocation::class, 'location_id', 'location_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tManufacturer() {
        return $this->belongsTo(\App\Models\TManufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }


}
