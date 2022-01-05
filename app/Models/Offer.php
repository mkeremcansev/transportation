<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic_id',
        'user_id',
    ];

    public function getOfferTopic()
    {
        return $this->hasOne(Topic::class, 'id', 'topic_id');
    }
}
