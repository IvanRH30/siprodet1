<?php
namespace App\Controllers;

use App\Services\Modulo1Service;

class Modulo1Controller extends BaseController
{
    private $miModulo1Service;
    public function __construct() {
        $this->miModulo1Service = new Modulo1Service();
    }
    public function index()
    {
        return view('Modulo/Modulo1View');
    }
}
