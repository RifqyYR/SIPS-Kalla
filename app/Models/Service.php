<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    const TYPE_BOOK = 'BOOK';
    const TYPE_VISIT = 'VISIT';
    const STATUS_WAITING = 'WAITING';
    const STATUS_CONFIRMED = 'CONFIRMED';
    const STATUS_CANCELLED = 'CANCELLED';
    const STATUS_DONE = 'DONE';

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function clientCar()
    {
        return $this->belongsTo(ClientCars::class);
    }
}
