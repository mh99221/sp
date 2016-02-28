<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPartyOverallReview extends Model {

    /**
     * Generated
     */

    protected $table = 't_party_overall_review';
    protected $fillable = ['party_overall_review_id', 'party_id', 'review_value', 'review_count', 'comment_count'];


    public function tParty() {
        return $this->belongsTo(\App\Models\TParty::class, 'party_id', 'party_id');
    }


}
