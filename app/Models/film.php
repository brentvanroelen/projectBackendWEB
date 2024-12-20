<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster_path',
        'release_date',
    ];

    // Many-to-Many relationship: Film has many Users through FilmListItems
    public function usersSeen()
    {
        return $this->belongsToMany(User::class, 'film_list_items', 'film_id', 'user_id')
                    ->wherePivot('list_type', 'seen');
    }

    public function usersWantToWatch()
    {
        return $this->belongsToMany(User::class, 'film_list_items', 'film_id', 'user_id')
                    ->wherePivot('list_type', 'to_watch');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageScore()
    {
        return $this->reviews()->avg('score');
    }
}