<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function actions() {
        return $this->hasMany(UserAction::class);
    }

    public function hasPermission(array $permissions) {
        $user_permissions = $this->role->permissions->pluck('name')->toArray();
        foreach($permissions as $permission) {
            if(in_array($permission, $user_permissions)) {
                return true; 
            }
        }

        return false;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
