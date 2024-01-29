<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamentos extends Model
{
    public function contactos()
    {
        return $this->hasMany(contactos::class);
    }
}
