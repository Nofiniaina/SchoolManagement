<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    /** @use HasFactory<\Database\Factories\MentionFactory> */
    use HasFactory;

    protected $fillable = ['name', 'domaine_id'];

    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }

    public function parcours(){
        return $this->hasMany(Parcours::class);
    }
}
