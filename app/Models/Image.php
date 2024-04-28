<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'reservation_id'];

    // Define the relationship with the Reservation model
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}