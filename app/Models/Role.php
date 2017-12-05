<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function Permissions() {
        return $this->belongsToMany(
            Permissions::class, 'roles_permissions', 'role_id', 'permission_id'
        );
    }

    public $timestamps = false;

}
