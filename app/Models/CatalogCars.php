<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCars extends Model
{
    use HasFactory;

    const TYPE_USED = 'USED';
    const TYPE_NEW = 'NEW';

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
