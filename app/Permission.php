<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';

    protected $fillable=['name','route','url','module_id','menu_display','status','created_by','updated_by'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
