<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table='product_images';

    protected $fillable=['name','created_by','updated_by','product_id','status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
