<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Advertise extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'title',
        'price',
        'isNegotiable',
        'description',
        'user_id',
        'category_id',
        'state_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
