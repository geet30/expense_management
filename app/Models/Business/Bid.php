<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bid_id',
        'bid_url',
        'perposal',
        'comment',
        'user_id',
    ];

    /*protected $appends = ['bid_profile'];

    public function getBidProfileAttribute() {
        return BidProfile::select(['id', 'name','url'])->find($this->attributes['bid_id']);
    }*/

    public function bidprofile() {
        return $this->belongsTo('App\Models\Business\BidProfile', 'bid_id', 'id');
    }
    public function biduser() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}
