<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Persona extends Authenticatable
{
    public function getAuthKey()
    {
        return $this->key;
    }
    public $table = 'persona';
    use Notifiable;

    protected $fillable = [
        'nombre','apellido','ci', 'direccion','telefono','fecha_nac','genero','email', 'password','usuario','id_tipopersona','codigo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    public function tipo()
    {
        return $this->belongsTo('App\Tipopersona','id_tipopersona');
    }
    //
    public function alumno()
    {
        return $this->belongsToMany('App\Persona','parentezco','id_tutor','id_alumno');
    }
    public function tutor()
    {
        return $this->belongsToMany('App\Persona','parentezco','id_alumno','id_tutor');
    }
}
