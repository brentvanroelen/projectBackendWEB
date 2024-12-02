<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'role',
        'birthday',
        'profile_picture',
        'description',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // One-to-Many relationship: User has many FilmLists
    public function filmLists()
    {
        return $this->hasMany(FilmList::class);
    }

    // Many-to-Many relationship: User has many Films through FilmListItems
    public function seenFilms()
    {
        return $this->belongsToMany(Film::class, 'film_list_items', 'user_id', 'film_id')
                    ->wherePivot('list_type', 'seen');
    }

    public function wantToWatchFilms()
    {
        return $this->belongsToMany(Film::class, 'film_list_items', 'user_id', 'film_id')
                    ->wherePivot('list_type', 'to_watch');
    }
}