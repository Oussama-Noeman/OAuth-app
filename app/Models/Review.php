<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable=[
        'comment',
        'user_id',
        'product_id'
    ];

    //Relation between review and user
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    //Relation between review and product
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    //Relation between review and image
    public function image()
    {
        return $this->morphOne(Image::class,'immagable');
    }
}
