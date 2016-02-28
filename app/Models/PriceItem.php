<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPriceItem extends Model {

    /**
     * Generated
     */

    protected $table = 't_price_item';
    protected $fillable = ['price_item_id', 'price_item_status_id', 'price_item_type_id', 'party_id', 'item_name', 'price_category_1', 'price_category_2', 'price_category_3', 'price_category_4', 'measure_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'measure_id', 'lov_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'price_item_status_id', 'lov_id');
    }

    public function tCategory() {
        return $this->belongsTo(\App\Models\TCategory::class, 'price_item_type_id', 'category_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
