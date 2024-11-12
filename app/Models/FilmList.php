<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title'];

    public function items()
    {
        return $this->hasMany(FilmListItem::class);
    }
}
