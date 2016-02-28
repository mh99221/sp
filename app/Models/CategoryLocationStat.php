<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TCategoryLocationStat extends Model {

    /**
     * Generated
     */

    protected $table = 't_category_location_stats';
    protected $fillable = ['category_id', 'location_id', 'manufacturer_id', 'count_all', 'count_active_parties', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tCategory() {
        return $this->belongsTo(\App\Models\TCategory::class, 'category_id', 'category_id');
    }

    public function tLocation() {
        return $this->belongsTo(\App\Models\TLocation::class, 'location_id', 'location_id');
    }

    public function tManufacturer() {
        return $this->belongsTo(\App\Models\TManufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }


}
