<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Types extends Model
{
    use HasFactory;

    protected $table = 'room_features';

    protected $fillable = ['type', 'number_of_rooms', 'number_of_beds', 'bathroom', 'balcony', 'workspace', 'TV', 'wifi'. 'minibar', 'price'];

    public function rooms()
    {
        return $this->hasMany(Reservation::class);
    }
}