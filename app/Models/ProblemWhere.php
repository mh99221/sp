<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TProblemWhere extends Model {

    /**
     * Generated
     */

    protected $table = 't_problem_where';
    protected $fillable = ['problem_where_id', 'where_name_en', 'where_name_sk', 'where_descr', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tProblemSolutions() {
        return $this->hasMany(\App\Models\TProblemSolution::class, 'problem_where_id', 'problem_where_id');
    }


}
