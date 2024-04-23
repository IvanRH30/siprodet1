<?php
namespace App\Services;

use App\Models\Modulo4Model;

class Modulo4Service 
{
    private $miModulo4Service;
    public function __construct() {
        $this->miModulo4Service = new Modulo4Model();
    }
}
