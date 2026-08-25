<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_date', 'price', 'places_available', 'status'];

    // ✅ C'est cette ligne qui corrige l'erreur :
    protected $casts = [
        'start_date' => 'date',
    ];

    // Relation : Une formation peut avoir plusieurs inscriptions
    public function registrations()
    {
        return $this->hasMany(FormationRegistration::class);
    }
}