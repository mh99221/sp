<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TCategory extends Model {

    /**
     * Generated
     */

    protected $table = 't_category';
    protected $fillable = ['category_id', 'parent_category_id', 'category_type_id', 'category_status_id', 'category_name', 'category_descr', 'category_url', 'category_level', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'category_status_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'category_type_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tCategory() {
        return $this->belongsTo(\App\Models\TCategory::class, 'parent_category_id', 'category_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tCategories() {
        return $this->hasMany(\App\Models\TCategory::class, 'parent_category_id', 'category_id');
    }

    public function tCategoryLocationPartyRels() {
        return $this->hasMany(\App\Models\TCategoryLocationPartyRel::class, 'category_id', 'category_id');
    }

    public function tCategoryLocationStats() {
        return $this->hasMany(\App\Models\TCategoryLocationStat::class, 'category_id', 'category_id');
    }

    public function tPartyCategoryRels() {
        return $this->hasMany(\App\Models\TPartyCategoryRel::class, 'category_id', 'category_id');
    }

    public function tPriceItems() {
        return $this->hasMany(\App\Models\TPriceItem::class, 'price_item_type_id', 'category_id');
    }

    public function tServiceRequestCategoryRels() {
        return $this->hasMany(\App\Models\TServiceRequestCategoryRel::class, 'category_id', 'category_id');
    }


}
