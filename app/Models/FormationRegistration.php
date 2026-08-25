<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationRegistration extends Model
{
    use HasFactory;

    protected $fillable = ['formation_id', 'name', 'email', 'phone', 'status'];

    // Relation : L'inscription appartient à une formation
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}