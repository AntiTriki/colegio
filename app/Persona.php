<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'persona';

    public function cuentas(){
        return $this->hasMany(Cuenta::class);
    }
}
