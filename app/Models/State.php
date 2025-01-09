<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class State extends Model
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function advertises()
    {
        return $this->hasMany(Advertise::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
