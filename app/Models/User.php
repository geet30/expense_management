<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   


     public function hasAccess(array $permissions)
    {
       foreach($permissions as $permission){
            if($this->hasPermission($permission)){
                return true;
            }
       }
       return false;
    }

    protected function hasPermission(string $permission)
    {
        $permissions= json_decode($this->permissions,true);
        return $permissions[$permission]??false;
    }

    public function inRole($roleSlug)
    {
        return $this->roles()->where('slug',$roleSlug)->count()==1;
    }
    public function bids() {
        return $this->hasMany('App\Models\Business\Bid', 'user_id', 'id');
    }
}
