<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_job', 'machine'
    // ];
    public function category()
    {
        return $this->belongsTo(categorie::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
