<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Notifications\Notifiable;

class Order extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia ,Notifiable;
    protected $guarded = ['id'];


    public function photo()
    {
        return $this->media()->where('collection_name', 'photo');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


    public function product()
{
    return $this->belongsTo(Product::class);
}

}
