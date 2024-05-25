<?php
namespace App\Models;
use CodeIgniter\Model;

class PerfilesModel extends Model{
    protected $table = 'Perfiles';
    protected $primaryKey = 'id';
    protected $allowedFields =
    [
        'nombre',
        'num_nivel_seguridad',
        'fecha_alta',
        'fecha_cambio',
        'fecha_baja',
        'activo',
        'facultado_modificacion',

    ];

    protected $returnType = 'object';

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_cambio';
    protected $deletedField  = 'fecha_baja';

}