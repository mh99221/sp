<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TComment extends Model {

    /**
     * Generated
     */

    protected $table = 't_comment';
    protected $fillable = ['comment_id', 'comment_status_id', 'parent_comment_id', 'party_id', 'review_id', 'comment_title', 'comment_body', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'created_by', 'user_id');
    }

    public function tReview() {
        return $this->belongsTo(\App\Models\TReview::class, 'review_id', 'review_id');
    }

    public function tLov() {
        return $this->belongsTo(\App\Models\TLov::class, 'comment_status_id', 'lov_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'updated_by', 'user_id');
    }

    public function tComment() {
        return $this->belongsTo(\App\Models\TComment::class, 'parent_comment_id', 'comment_id');
    }

    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }

    public function tUser() {
        return $this->belongsTo(\App\Models\TUser::class, 'deleted_by', 'user_id');
    }

    public function tComments() {
        return $this->hasMany(\App\Models\TComment::class, 'parent_comment_id', 'comment_id');
    }

    public function tCommentLikes() {
        return $this->hasMany(\App\Models\TCommentLike::class, 'comment_id', 'comment_id');
    }


}
