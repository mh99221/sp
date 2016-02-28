<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TProblemSolution extends Model {

    /**
     * Generated
     */

    protected $table = 't_problem_solution';
    protected $fillable = ['problem_solution_id', 'problem_category_id', 'problem_symptom_id', 'problem_when_id', 'problem_where_id', 'priority', 'what_to_do_en', 'part_type_en', 'cause_descr_en', 'what_to_do_sk', 'part_type_sk', 'cause_descr_sk', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tProblemCategory() {
        return $this->belongsTo(\App\Models\TProblemCategory::class, 'problem_category_id', 'problem_category_id');
    }

    public function tProblemWhen() {
        return $this->belongsTo(\App\Models\TProblemWhen::class, 'problem_when_id', 'problem_when_id');
    }

    public function tProblemWhere() {
        return $this->belongsTo(\App\Models\TProblemWhere::class, 'problem_where_id', 'problem_where_id');
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
