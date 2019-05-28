<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tags';
    protected $fillable=['name','slug','status','created_by','updated_by'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
