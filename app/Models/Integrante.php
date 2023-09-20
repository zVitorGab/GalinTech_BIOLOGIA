<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Iluminate\Database\Eloquent\softDeletes;

class Integrante extends Model
{
    use HasFactory;
    use softDeletes;
}
