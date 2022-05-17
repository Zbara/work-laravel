<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandCar extends Model
{
    use HasFactory;

    public function modelCar(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ModelCar::class);
    }
}
