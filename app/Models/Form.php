<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TForm extends Model {

    /**
     * Generated
     */

    protected $table = 't_form';
    protected $fillable = ['form_name', 'model_name', 'base_table_column_id', 'base_table_column_status_id', 'form_buttons', 'form_code'];



}
