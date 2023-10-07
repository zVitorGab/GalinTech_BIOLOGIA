<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docencia extends Model
{
    use HasFactory;

    public function disciplina(){
        return $this->belongsTo('\App\Models\Disciplina');
    }
    public function professor(){
        return $this->belongsTo('\App\Models\Professor');
    }
}
