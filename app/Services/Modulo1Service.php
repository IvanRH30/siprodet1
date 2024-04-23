<?php
namespace App\Services;

use App\Models\Modulo1Model;

class Modulo1Service 
{
    private $miModulo1Service;
    public function __construct() {
        $this->miModulo1Service = new Modulo1Model();
    }
}
