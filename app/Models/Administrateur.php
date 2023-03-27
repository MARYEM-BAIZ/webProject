<?php

namespace App\Models;
use User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    public function user(){

        return $this->belongsTo(User::class);

    }
}
