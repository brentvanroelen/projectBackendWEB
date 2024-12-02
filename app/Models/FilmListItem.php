<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmListItem extends Model
{
    use HasFactory;

    protected $fillable = ['film_list_id', 'film_id', 'film_title', 'film_poster'];

    // Many-to-One relationship: FilmListItem belongs to a FilmList
    public function filmList()
    {
        return $this->belongsTo(FilmList::class);
    }

    // Many-to-One relationship: FilmListItem belongs to a Film
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}