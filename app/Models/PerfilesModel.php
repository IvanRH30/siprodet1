<?php
namespace App\Models;
use CodeIgniter\Model;

class PerfilesModel extends Model{
    protected $table = 'Perfiles';
    protected $primaryKey = 'id';
    protected $allowedFields =
    [
        'nombre',
    ];

    protected $returnType = 'object';
}