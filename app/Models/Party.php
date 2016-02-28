<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model {

    /**
     * Generated
     */

    protected $table = 't_party';
    protected $fillable = ['party_id', 'master_record_id', 'party_status_id', 'party_url', 'full_name', 'salutation_id', 'title_prefix', 'first_name', 'last_name', 'title_suffix', 'birth_date', 'individual_flag', 'party_profile', 'logo', 'link', 'party_descr', 'ico', 'dic', 'ic_dph', 'registration_date', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    public function salutation() {
        return $this->belongsTo(Lov::class, 'salutation_id', 'lov_id');
    }

    public function status() {
        return $this->belongsTo(Lov::class, 'party_status_id', 'lov_id');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by', 'user_id');
    }

    public function addresses() {
        return $this->hasMany(Address::class, 'party_ID', 'party_id');
    }

    /*
    public function CategoryLocationPartyRels() {
        return $this->hasMany(CategoryLocationPartyRel::class, 'party_id', 'party_id');
    }
    */

    public function comments() {
        return $this->hasMany(Comment::class, 'party_id', 'party_id');
    }

    public function contacts() {
        return $this->hasMany(Contact::class, 'party_id', 'party_id');
    }

    public function sentEmails() {
        return $this->hasMany(Email::class, 'sender_party_id', 'party_id');
    }

    public function receivedEmails() {
        return $this->hasMany(Email::class, 'receiver_party_id', 'party_id');
    }

    public function files() {
        return $this->hasMany(File::class, 'party_id', 'party_id');
    }

    public function workingHours() {
        return $this->hasMany(Hour::class, 'party_id', 'party_id');
    }

    /*
    public function hasLabels() {
        return $this->hasMany(Label::class, 'party_id', 'party_id');
    }
    */

    public function repairOrSellBrands() {
        return $this->hasMany(ManufacturerPartyRel::class, 'party_id', 'party_id');
    }

    public function categories() {
        return $this->hasMany(PartyCategoryRel::class, 'party_id', 'party_id');
    }

    /*
    public function PartyOverallReviews() {
        return $this->hasMany(PartyOverallReview::class, 'party_id', 'party_id');
    }
    

    public function PartyRels() {
        return $this->hasMany(PartyRel::class, 'party_id', 'party_id');
    }

    public function PartyRels() {
        return $this->hasMany(PartyRel::class, 'related_party_id', 'party_id');
    }
    
    public function PartyTagRels() {
        return $this->hasMany(PartyTagRel::class, 'party_id', 'party_id');
    }
    

    public function PriceItems() {
        return $this->hasMany(PriceItem::class, 'party_id', 'party_id');
    }
    */

    public function reviews() {
        return $this->hasMany(Review::class, 'party_id', 'party_id');
    }

    /*
    public function ServiceHistories() {
        return $this->hasMany(ServiceHistory::class, 'service_party_id', 'party_id');
    }

    public function ServiceRequests() {
        return $this->hasMany(ServiceRequest::class, 'party_id', 'party_id');
    }

    public function ServiceResponses() {
        return $this->hasMany(ServiceResponse::class, 'party_id', 'party_id');
    }

    public function Users() {
        return $this->hasMany(User::class, 'party_id', 'party_id');
    }
    */

    public function vehicles() {
        return $this->hasMany(Vehicle::class, 'party_id', 'party_id');
    }


}
