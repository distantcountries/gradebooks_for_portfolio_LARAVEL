<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gradebook;

class Student extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'image', 'gradebook_id'
    ];

    public function gradebook()
    {
        return $this->belongsTo(Gradebook::class);
    }

    const STORE_RULES = [
        'firstName' => 'required|min:2|max:255',
        'lastName' => 'required|min:2|max:255'
    ];
}
