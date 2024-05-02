<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = ['id', 'room_id', 'amount','user_id', 'startdate', 'enddate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservation(){
        return $this->belongsTo(Reservation::class, 'id');
    }
}