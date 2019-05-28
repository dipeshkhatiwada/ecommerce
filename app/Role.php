<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';

    protected $fillable=['name','status','created_by','updated_by'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function perm()
    {
        return $this->belongsToMany(Permission::class,'permission_role')->select(array('permission_id'));
    }
    public function mod()
    {
        return $this->belongsToMany(Module::class,'module_role')->select(array('module_id'));
    }

}
