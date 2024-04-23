<?php
namespace App\Services;

use App\Models\Modulo3Model;

class Modulo3Service 
{
    private $miModulo3Service;
    public function __construct() {
        $this->miModulo3Service = new Modulo3Model();
    }
}
