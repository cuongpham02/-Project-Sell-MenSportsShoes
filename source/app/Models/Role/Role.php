<?php

namespace App\Models\Role;

use App\Models\Permission\Permission;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'roles_name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'roles';
    public function users(){
        return $this->belongsToMany(User::class,'users_roles','role_id','user_id');
    }
    public function permission(){
        return $this->belongsToMany(Permission::class,'roles_permissions','role_id','permission_id');
    }
}
