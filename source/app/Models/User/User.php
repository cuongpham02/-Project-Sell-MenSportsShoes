<?php

namespace App\Models\User;


use App\Models\Role\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, softDeletes;
    public $timestamps = true;
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'flag', 'address'
    ];
    protected $primaryKey = 'id';
    protected $table = 'users';
    public function roles(){
        return $this->belongsToMany(Role::class,'users_roles','user_id','role_id');
    }
    public function hasAnyRoles($roles){
        return null !==  $this->roles()->whereIn('roles_name',$roles)->first();
    }
    public function hasRole($role){
        return null !==  $this->roles()->where('roles_name',$role)->first();
    }
}
