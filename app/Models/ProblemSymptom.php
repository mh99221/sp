<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TProblemSymptom extends Model {

    /**
     * Generated
     */

    protected $table = 't_problem_symptom';
    protected $fillable = ['problem_symptom_id', 'problem_category_id', 'symptom_name_en', 'symptom_name_sk', 'symptom_descr', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tProblemCategory() {
        return $this->belongsTo(\App\Models\TProblemCategory::class, 'problem_category_id', 'problem_category_id');
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
