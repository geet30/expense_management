<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','permissions',
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class,'user_type');
    }

    public function hasAccess(array $permissions)
    {
    	dd($permissions);
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
}
