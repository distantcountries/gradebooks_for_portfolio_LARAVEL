<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;
use App\Student;

class Gradebook extends Model
{
    protected $fillable = [
        'name', 'user_id'
   
    ];

    const STORE_RULES = [
        'name' => 'required|min:2|max:255'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
