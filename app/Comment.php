<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'user_id', 'gradebook_id'
    ];

    const STORE_RULES = [
        'content' => 'required|min:1|max:1000'
    ];

    public function gradebook()
    {
        return $this->belongsTo(Gradebook::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
