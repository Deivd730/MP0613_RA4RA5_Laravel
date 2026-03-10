<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'country',
        'img_url'
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    /**
     * Get the films for the actor.
     */
    public function films()
    {
        return $this->belongsToMany(Film::class, 'films_actors');
    }
}
