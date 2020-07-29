<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publishers';
    protected $fillable = [
        'name'
    ];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
