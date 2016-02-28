<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TProblemWhen extends Model {

    /**
     * Generated
     */

    protected $table = 't_problem_when';
    protected $fillable = ['problem_when_id', 'when_name_en', 'when_name_sk', 'when_descr', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tProblemSolutions() {
        return $this->hasMany(\App\Models\TProblemSolution::class, 'problem_when_id', 'problem_when_id');
    }


}
