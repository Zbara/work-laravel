<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCar extends Model
{
    use HasFactory;

    public function brandCar(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BrandCar::class);
    }
}