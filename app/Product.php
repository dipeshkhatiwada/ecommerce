<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Attribute;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['category_id','subcategory_id','name','slug','price','discount','quantity','stock',
        'short_description','description','slider_key','discount_key','view_count','status','created_by','updated_by'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function product_attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
