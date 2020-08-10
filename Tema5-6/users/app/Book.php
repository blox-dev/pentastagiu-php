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
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'transactions')->withPivot('transaction_time','return_time');
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }
}
