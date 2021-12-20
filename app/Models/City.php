<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'slug', 'latitude', 'longitude', 'parent_id'];
    public function getMainCity()
    {
        return $this->hasOne(City::class, 'id', 'parent_id');
    }
    public function getSubCity()
    {
        return $this->hasMany(City::class, 'parent_id');
    }
}
