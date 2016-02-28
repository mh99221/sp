<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TLov extends Model {

    /**
     * Generated
     */

    protected $table = 't_lov';
    protected $fillable = ['lov_id', 'lov_type', 'lov_name', 'lov_name_sk', 'lov_name_cz', 'lov_descr', 'order_pos', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];


    public function tAddresses() {
        return $this->hasMany(\App\Models\TAddress::class, 'address_status_id', 'lov_id');
    }

    public function tAddresses() {
        return $this->hasMany(\App\Models\TAddress::class, 'address_type_id', 'lov_id');
    }

    public function tArticles() {
        return $this->hasMany(\App\Models\TArticle::class, 'article_status_id', 'lov_id');
    }

    public function tCategories() {
        return $this->hasMany(\App\Models\TCategory::class, 'category_status_id', 'lov_id');
    }

    public function tCategories() {
        return $this->hasMany(\App\Models\TCategory::class, 'category_type_id', 'lov_id');
    }

    public function tComments() {
        return $this->hasMany(\App\Models\TComment::class, 'comment_status_id', 'lov_id');
    }

    public function tCommentLikes() {
        return $this->hasMany(\App\Models\TCommentLike::class, 'comment_like_status_id', 'lov_id');
    }

    public function tCommentLikes() {
        return $this->hasMany(\App\Models\TCommentLike::class, 'comment_like_type_id', 'lov_id');
    }

    public function tContacts() {
        return $this->hasMany(\App\Models\TContact::class, 'contact_type_id', 'lov_id');
    }

    public function tContacts() {
        return $this->hasMany(\App\Models\TContact::class, 'contact_status_id', 'lov_id');
    }

    public function tEmails() {
        return $this->hasMany(\App\Models\TEmail::class, 'email_status_id', 'lov_id');
    }

    public function tEmails() {
        return $this->hasMany(\App\Models\TEmail::class, 'email_type_id', 'lov_id');
    }

    public function tFiles() {
        return $this->hasMany(\App\Models\TFile::class, 'file_type_id', 'lov_id');
    }

    public function tFiles() {
        return $this->hasMany(\App\Models\TFile::class, 'file_status_id', 'lov_id');
    }

    public function tFileLabelRels() {
        return $this->hasMany(\App\Models\TFileLabelRel::class, 'file_label_rel_status_id', 'lov_id');
    }

    public function tHours() {
        return $this->hasMany(\App\Models\THour::class, 'hour_status_id', 'lov_id');
    }

    public function tLabels() {
        return $this->hasMany(\App\Models\TLabel::class, 'label_status_id', 'lov_id');
    }

    public function tLocations() {
        return $this->hasMany(\App\Models\TLocation::class, 'location_status_id', 'lov_id');
    }

    public function tLocations() {
        return $this->hasMany(\App\Models\TLocation::class, 'location_type_id', 'lov_id');
    }

    public function tManufacturers() {
        return $this->hasMany(\App\Models\TManufacturer::class, 'manufacturer_status_id', 'lov_id');
    }

    public function tManufacturerPartyRels() {
        return $this->hasMany(\App\Models\TManufacturerPartyRel::class, 'manufacturer_party_rel_type_id', 'lov_id');
    }

    public function tManufacturerPartyRels() {
        return $this->hasMany(\App\Models\TManufacturerPartyRel::class, 'manufacturer_party_rel_status_id', 'lov_id');
    }

    public function tMessages() {
        return $this->hasMany(\App\Models\TMessage::class, 'message_type_id', 'lov_id');
    }

    public function tMessages() {
        return $this->hasMany(\App\Models\TMessage::class, 'resource_type_id', 'lov_id');
    }

    public function tMessages() {
        return $this->hasMany(\App\Models\TMessage::class, 'message_status_id', 'lov_id');
    }

    public function tPageRequests() {
        return $this->hasMany(\App\Models\TPageRequest::class, 'page_request_status_id', 'lov_id');
    }

    public function tParties() {
        return $this->hasMany(\App\Models\TParty::class, 'salutation_id', 'lov_id');
    }

    public function tParties() {
        return $this->hasMany(\App\Models\TParty::class, 'party_status_id', 'lov_id');
    }

    public function tPartyCategoryRels() {
        return $this->hasMany(\App\Models\TPartyCategoryRel::class, 'party_category_rel_status_id', 'lov_id');
    }

    public function tPartyRels() {
        return $this->hasMany(\App\Models\TPartyRel::class, 'party_rel_status_id', 'lov_id');
    }

    public function tPartyRels() {
        return $this->hasMany(\App\Models\TPartyRel::class, 'party_rel_type_id', 'lov_id');
    }

    public function tPartyTagRels() {
        return $this->hasMany(\App\Models\TPartyTagRel::class, 'party_tag_rel_status_id', 'lov_id');
    }

    public function tPermissions() {
        return $this->hasMany(\App\Models\TPermission::class, 'resource_type_id', 'lov_id');
    }

    public function tPriceItems() {
        return $this->hasMany(\App\Models\TPriceItem::class, 'measure_id', 'lov_id');
    }

    public function tPriceItems() {
        return $this->hasMany(\App\Models\TPriceItem::class, 'price_item_status_id', 'lov_id');
    }

    public function tReviews() {
        return $this->hasMany(\App\Models\TReview::class, 'review_status_id', 'lov_id');
    }

    public function tReviews() {
        return $this->hasMany(\App\Models\TReview::class, 'visited_id', 'lov_id');
    }

    public function tSearches() {
        return $this->hasMany(\App\Models\TSearch::class, 'search_status_id', 'lov_id');
    }

    public function tServiceHistories() {
        return $this->hasMany(\App\Models\TServiceHistory::class, 'service_history_status_id', 'lov_id');
    }

    public function tServiceHistoryItems() {
        return $this->hasMany(\App\Models\TServiceHistoryItem::class, 'service_history_item_status_id', 'lov_id');
    }

    public function tServiceRequests() {
        return $this->hasMany(\App\Models\TServiceRequest::class, 'service_request_status_id', 'lov_id');
    }

    public function tServiceRequestCategoryRels() {
        return $this->hasMany(\App\Models\TServiceRequestCategoryRel::class, 'service_request_category_rel_status_id', 'lov_id');
    }

    public function tServiceRequestFileRels() {
        return $this->hasMany(\App\Models\TServiceRequestFileRel::class, 'service_request_file_rel_status_id', 'lov_id');
    }

    public function tServiceResponses() {
        return $this->hasMany(\App\Models\TServiceResponse::class, 'service_response_status_id', 'lov_id');
    }

    public function tTags() {
        return $this->hasMany(\App\Models\TTag::class, 'tag_status_id', 'lov_id');
    }

    public function tUsers() {
        return $this->hasMany(\App\Models\TUser::class, 'user_status_id', 'lov_id');
    }

    public function tUserExts() {
        return $this->hasMany(\App\Models\TUserExt::class, 'user_ext_status_id', 'lov_id');
    }

    public function tVehicles() {
        return $this->hasMany(\App\Models\TVehicle::class, 'alert_ec_tc_id', 'lov_id');
    }

    public function tVehicles() {
        return $this->hasMany(\App\Models\TVehicle::class, 'vehicle_status_id', 'lov_id');
    }

    public function tVehicleModels() {
        return $this->hasMany(\App\Models\TVehicleModel::class, 'vehicle_model_status_id', 'lov_id');
    }

    public function tVehicleTypes() {
        return $this->hasMany(\App\Models\TVehicleType::class, 'vehicle_type_status_id', 'lov_id');
    }


}
