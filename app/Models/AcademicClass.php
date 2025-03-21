<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    /** @use HasFactory<\Database\Factories\AcademicClassFactory> */
    use HasFactory;

    protected $fillable = ['name', 'level', 'description', 'mention_id'];

    public function mention(){
        return $this->belongsTo(Mention::class);
    }
}
