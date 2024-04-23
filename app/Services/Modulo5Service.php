<?php
namespace App\Services;

use App\Models\Modulo5Model;

class Modulo5Service 
{
    private $miModulo5Service;
    public function __construct() {
        $this->miModulo5Service = new Modulo5Model();
    }
}
