<?php
namespace App\Services;

use App\Models\Modulo2Model;

class Modulo2Service 
{
    private $miModulo2Service;
    public function __construct() {
        $this->miModulo2Service = new Modulo2Model();
    }
}
