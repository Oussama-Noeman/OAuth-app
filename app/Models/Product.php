<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable= [
        'title',
        'description',
        'user_id'
    ];

    //Relation between product and details
    public function details()
    {
        return $this->hasOne(ProductDetail::class,'product_id','id');
    }

    //Relation between product and review
    public function reviews()
    {
        return $this->hasMany(Review::class,'product_id','id');
    }

    //Relation between product and image
    public function imagable()
    {
        return $this->morphOne(Image::class,'immagable');
    }
}
