<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primary_key = 'id';
    protected $allowedFields = 
    [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'estatus',
    ];
    protected $return_type = 'object';

    public function getUsuarioLogin($correo,$password)
    {
        try {
            $usuario = $this->where('email',$correo)->where('password',$password)->get()->getRow();
            return $usuario;
        } catch (\Exception $th) {
            return false;
        }        
    }
}
