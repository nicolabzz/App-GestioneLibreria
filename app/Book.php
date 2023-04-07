<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'summary',
        'added_date',
        'deleted_date',
        'read_count',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
