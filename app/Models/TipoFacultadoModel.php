<?php 
namespace App\Models;
use CodeIgniter\Model;

class TipoFacultadoModel extends Model{

    protected $table = "FacultadoTipo";
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'nombre',
    ];

    protected $returnType = 'object';
}