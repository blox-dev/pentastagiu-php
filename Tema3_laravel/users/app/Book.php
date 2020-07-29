<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title',
        'author_id',
        'publisher_id',
        'publish_year'
    ];

    public function author()
    {
        return $this->hasOne('App\Author');
    }

    public function publisher()
    {
        return $this->hasOne('App\Publisher');
    }
}
