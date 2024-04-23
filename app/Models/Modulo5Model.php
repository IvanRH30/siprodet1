<?php

namespace App\Models;

use CodeIgniter\Model;

class Modulo5Model extends Model
{
    protected $table = 'Modulo5';
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

