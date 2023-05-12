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
    
    //many parties
    public function partie()
    {
        return $this->hasMany(Partie::class);
    }

    //many learners
    public function learner()
    {
        return $this->belongsToMany(User::class,'prendre_course_users','course_id','user_id')
        ->withPivot('date_review', 'review','access','comment','date_comment','id');
    }

    // every comment has course and user 
    public function comment()
    {
        return $this->belongsToMany(User::class,'comment_course_users');
    }
    //every course has one former
    public function user()
    {
        return $this->belongsTo(User::class);
    }





}
