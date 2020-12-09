<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function client()
    {
      return $this->belongsTo('App\Models\Client','client_id','id');
    }

    public function room()
    {
      return $this->belongsTo('App\Models\Room','room_id','id');
    }
}
