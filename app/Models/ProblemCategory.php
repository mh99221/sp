<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TProblemCategory extends Model {

    /**
     * Generated
     */

    protected $table = 't_problem_category';
    protected $fillable = ['problem_category_id', 'category_name_en', 'category_name_sk', 'category_descr', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tProblemSolutions() {
        return $this->hasMany(\App\Models\TProblemSolution::class, 'problem_category_id', 'problem_category_id');
    }

    public function tProblemSymptoms() {
        return $this->hasMany(\App\Models\TProblemSymptom::class, 'problem_category_id', 'problem_category_id');
    }


}
