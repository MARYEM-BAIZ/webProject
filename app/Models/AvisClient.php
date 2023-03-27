<?php

namespace App\Models;
use Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisClient extends Model
{
    use HasFactory;

    public function client(){

        return $this->belongsTo(Client::class);

    }
}
