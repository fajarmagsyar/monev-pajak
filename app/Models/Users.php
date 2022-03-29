<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $keyType = 'string';
    protected $primaryKey = 'user_id';
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];
    protected $guarded = ['user_id'];

    public function roles()
    {
        return Users::select("users.*", "role.*")->join("role", "role.role_id", "=", "users.role_id");
    }

    public function hasRole($role_name)
    {
        return $this->roles()->where('users.user_id', '=', auth()->user()->user_id)->where('role.nama_role', '=', $role_name)->count() == 1;
    }
}
