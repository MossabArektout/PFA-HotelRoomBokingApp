<?php

namespace App\Models;

use App\Models\Types;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = ['id', 'numero', 'id_feature', 'avalibility'];

    public function type()
    {
        return $this->belongsTo(Types::class);
    }

    public function feature()
    {
        return $this->belongsTo(Types::class, 'id_feature');
    }
}
