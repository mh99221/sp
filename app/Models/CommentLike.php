<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TCommentLike extends Model {

    /**
     * Generated
     */

    protected $table = 't_comment_like';
    protected $fillable = ['comment_like_id', 'comment_like_status_id', 'user_id', 'comment_id', 'comment_like_type_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'user_id', 'user_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'comment_like_status_id', 'lov_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'comment_like_type_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tComment() {
        return $this->belongsTo(\App\Models\TComment::class, 'comment_id', 'comment_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }


}
