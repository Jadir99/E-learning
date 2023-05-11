<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(course::class);
    }


    //*******************************************************************for Answers table between partie user quiz********************* */
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class,'answer_user_partie_quizzes');
    }

    //many learners
    public function users_quiz()
    {
        return $this->belongsToMany(User::class,'answer_user_partie_quizzes');
    }
    //*******************************************************************end of  Answers table between partie user quiz********************* */


    //*******************************************************************for delivery table between partie user devoir********************* */
    public function devoirs()
    {
        return $this->hasMany(Devoir::class);
    }

    //many learners
    public function users_devoir()
    {
        return $this->belongsToMany(User::class,'delivery_user_partie__devoirs');
    }
    //*******************************************************************end of  delivery table between partie user devoir********************* */
    //every partie has many devoir
    public function devoir()
    {
        return $this->hasMany(Devoir::class);
    }

    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }

    public function content()
    {
        return $this->hasMany(Conetent::class);
    }
}



