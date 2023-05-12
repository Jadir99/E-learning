<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //many courses to learn
    public function former()
    {
        return $this->hasMany(course::class);
    }
    

    //many courses to publish
    public function learning()
    {
        return $this->belongsToMany(course::class,'prendre_course_users','course_id','user_id')->withPivot('date_review', 'review','access','id');
    }


    // every comment has course and user 
    public function comment()
    {
        return $this->belongsToMany(course::class,'comment_course_users');
    }

    //*******************************************************************for delivery table between partie user devoir********************* */
    public function parties_devoir()
    {
        return $this->belongsToMany(Partie::class,'delivery_user_partie__devoirs');
    }

    //many learners
    public function devoirs()
    {
        return $this->belongsToMany(Devoir::class,'delivery_user_partie__devoirs');
    }
    //*******************************************************************end of  delivery table between partie user devoir********************* */

    
    //*******************************************************************for Answers table between partie user quiz********************* */
    public function parties_quize()
    {
        return $this->belongsToMany(Partie::class,'answer_user_partie_quizzes');
    }

    //many learners
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class,'answer_user_partie_quizzes');
    }
    //*******************************************************************end of  Answers table between partie user quiz********************* */

    
}
