<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactos extends Model
{
    public function departamento()
    {
        return $this->belongsTo(departamentos::class);
    }
}
