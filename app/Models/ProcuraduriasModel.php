<?php
namespace App\Models;

use CodeIgniter\Model;

class ProcuraduriasModel extends Model{

    protected $table = 'ProcuraduriasNum';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'nombre',
    ];

    protected $returnType = 'object';
}