<?php
namespace App\Models;
use CodeIgniter\Model;

class NuevoUsuarioModel extends Model{

    protected $table = 'sprc_Facultados';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'strFacultadoId',
        'numProcuraduriaID',
        'strNombre',
        'strAPaterno',
        'strAMaterno',
        'strPassword',
        'estatus',
        'numPerfilId',
        'strAreaId',
        'strIniciales',
        'strTitulo',
        'numTipoFacultadoId',
        'dtmFechaAlta',
        'dtmFechaCambio',
        'dtmFechaBaja',
        'numFacultadoAutorizado',
    ];

    protected $returnType = 'object';
}