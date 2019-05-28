<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table='product_attributes';
    protected $fillable=['product_id','name','value','status','created_by','updated_by'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
