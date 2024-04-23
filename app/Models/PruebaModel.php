<?php
namespace App\Models;

use CodeIgniter\Model;

class PruebaModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'estatus',
        'fk_cat_rol',
    ];
    protected $returnType = 'object';
}