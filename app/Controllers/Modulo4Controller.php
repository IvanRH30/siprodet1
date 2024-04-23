<?php
namespace App\Controllers;

use App\Services\Modulo4Service;

class Modulo4Controller extends BaseController
{
    private $miModulo4Service;
    public function __construct() {
        $this->miModulo4Service = new Modulo4Service();
    }
    public function index()
    {
        return view('Modulo/Modulo4View');
    }
}
