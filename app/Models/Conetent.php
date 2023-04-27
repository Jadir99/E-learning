<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conetent extends Model
{
    use HasFactory;


    //every content  has one partie
    public function partie()
    {
        return $this->belongsTo(Partie::class);
    }
}
