<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcours extends Model
{
    /** @use HasFactory<\Database\Factories\ParcoursFactory> */
    use HasFactory;

    protected $fillable = ['name', 'mention_id'];

    public function mention(){
        return $this->belongsTo(Mention::class);
    }
}
