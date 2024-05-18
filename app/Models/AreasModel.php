<?php
namespace App\Models;

use CodeIgniter\Model;

class AreasModel extends Model{

    protected $table = 'Areas';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'nombre',
    ];

    protected $returnType = 'object';
}