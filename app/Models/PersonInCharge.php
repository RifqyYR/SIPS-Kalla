<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonInCharge extends Model
{
    use HasFactory;

    const SECTOR_BOOK_SERVICE = 'BOOK_SERVICE';
    const SECTOR_VISIT_SERVICE = 'VISIT_SERVICE';
    const SECTOR_PICK_UP = 'PICK_UP';
    const SECTOR_FOOD_ORDER = 'FOOD_ORDER';
    const SECTOR_FREE_DRINK = 'FREE_DRINK';
    const SECTOR_ICE_CREAM = 'ICE_CREAM';
    const SECTOR_USED_CAR = 'USED_CAR';
    const SECTOR_SPAREPART = 'SPAREPART';

    protected $guarded = [];
}
