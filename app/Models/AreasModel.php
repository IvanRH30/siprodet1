<?php
namespace App\Models;

use CodeIgniter\Model;

class AreasModel extends Model{

    protected $table = 'Areas';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'nombre',
        'clave_area',
        'telefono_jefe',
        'telefono_subjefe',
        'telefono_secretaria',
        'telefono_fax',
        'fecha_alta',
        'fecha_cambio',
        'fecha_baja',
        'activo',
        'facultado_modificacion',
    ];

    protected $returnType = 'object'; 
    //agregar campo de area clave con sus reglas

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_cambio';
    protected $deletedField  = 'fecha_baja';

}