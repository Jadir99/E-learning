<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;


    
    //*******************************************************************for Answers table between partie user quiz********************* */
    public function parties_quize()
    {
        return $this->belongsToMany(Partie::class,'answer_user_partie_quizzes');
    }

    //many learners
    public function users()
    {
        return $this->belongsToMany(User::class,'answer_user_partie_quizzes');
    }
    //*******************************************************************end of  Answers table between partie user quiz********************* */


    //every quiz  has one partie
    public function partie()
    {
        return $this->belongsTo(Partie::class);
    }

    //everey quiz has many quistions
    public function question()
    {
        return $this->hasMany(Question::class);
    }



}
