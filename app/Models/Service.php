<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class, 'clients_id', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Cars::class, 'cars_id', 'id');
    }
}
