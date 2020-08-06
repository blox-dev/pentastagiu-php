<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'username'
    ];

    public function book()
    {
        return $this->belongsToMany(Book::class, 'transactions')->withPivot('transaction_time','return_time');
    }
}
