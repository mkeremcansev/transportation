<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'purchase_date',
        'delivery_date',
        'product_type',
        'product_quantity',
        'product_description',
        'vehicle_type',
        'departure_route',
        'arrival_route',
        'user_id',
        'price',
        'delivery',
        'tax',
        'status',
    ];
    public function getLocationInfo()
    {
        return $this->hasOne(City::class, 'id', 'departure_route');
    }
    public function getDepartureRoute()
    {
        return $this->hasOne(City::class, 'id', 'departure_route');
    }
    public function getArrivalRoute()
    {
        return $this->hasOne(City::class, 'id', 'arrival_route');
    }
    public function getUserInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function getVehicleInfo()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_type');
    }
    function getTopicOffer()
    {
        return $this->hasMany(Offer::class, 'topic_id', 'id');
    }
}
