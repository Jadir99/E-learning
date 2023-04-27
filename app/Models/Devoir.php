<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devoir extends Model
{
    use HasFactory;

    //*******************************************************************for delivery table between partie user devoir********************* */
    public function parties_devoir()
    {
        return $this->belongsToMany(Partie::class,'delivery_user_partie__devoirs');
    }

    //many learners
    public function users_devoir()
    {
        return $this->belongsToMany(User::class,'delivery_user_partie__devoirs');
    }
    //*******************************************************************end of  delivery table between partie user devoir********************* */

    //every devoir  has one partie
    public function partie()
    {
        return $this->belongsTo(Partie::class);
    }


}
