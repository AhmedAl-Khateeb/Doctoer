<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;




    protected $guarded = ['id'];


    public function photo()
    {
        return $this->media()->where('collection_name', 'photo');
    }

    // public function photo()
    // {
    //     return $this->getMedia('photo'); // استرجاع جميع الصور من مجموعة "photo"
    // }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }


}
