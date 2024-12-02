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

    public function usersSeen()
    {
        return $this->belongsToMany(User::class, 'seen_films');
    }

    public function usersWantToWatch()
    {
        return $this->belongsToMany(User::class, 'want_to_watch_films');
    }
}