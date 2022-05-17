<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendUser extends Model
{
    use HasFactory;

    public function saveData(int $brandId, int $modelId){
        $send = new SendUser;
        $send->brand = $brandId;
        $send->model = $modelId;
        $send->save();
    }
}
