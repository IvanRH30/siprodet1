<?php

namespace App\Models;

use CodeIgniter\Model;

class Modulo1Model extends Model
{
    protected $table = 'modulo1';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'campo1',
        'campo2',
        'campo3',
        'campo4',
        'campo5',
    ];
    protected $returnType = 'object';
}

