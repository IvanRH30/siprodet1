<?php
namespace App\Models;
use CodeIgniter\Model;

class NuevoUsuarioModel extends Model{

    protected $table = 'sprc_Facultados';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'strFacultadoId',
        'numProcuraduriaID',//CAMPO QUE TIENE RELACION CON LA TABLA PROCURAdurias
        'strNombre',
        'strAPaterno',
        'strAMaterno',
        'strPassword',
        'estatus',
        'numPerfilId',//campo que tienen relacion con la tabla perfiles
        'strAreaId', //camo que tiene relacion con la tabla de areas
        'strIniciales',
        'strTitulo',
        'numTipoFacultadoId',//campo que tiene relacion con la tabla tipo facultado
        'dtmFechaAlta',
        'dtmFechaCambio',
        'dtmFechaBaja',
        'numFacultadoAutorizado',
    ];

    protected $returnType = 'object';
}