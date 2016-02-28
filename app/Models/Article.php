<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TArticle extends Model {

    /**
     * Generated
     */

    protected $table = 't_article';
    protected $fillable = ['article_id', 'article_status_id', 'article_title', 'article_intro', 'article_body', 'cover_image', 'source_name', 'source_link', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'article_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
