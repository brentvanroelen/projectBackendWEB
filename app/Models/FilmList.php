<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title'];

    // One-to-Many relationship: FilmList belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One-to-Many relationship: FilmList has many FilmListItems
    public function items()
    {
        return $this->hasMany(FilmListItem::class);
    }
}