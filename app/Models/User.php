<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model {

    /**
     * Generated
     */

    protected $table = 't_user';
    protected $fillable = ['user_id', 'user_status_id', 'role', 'party_id', 'login', 'password', 'email', 'public_flag'];


    public function person() {
        return $this->belongsTo(Party::class, 'party_id', 'party_id');
    }

    public function status() {
        return $this->belongsTo(Lov::class, 'user_status_id', 'lov_id');
    }


}
