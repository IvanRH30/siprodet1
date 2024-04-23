<?php
namespace App\Controllers;

use App\Services\Modulo2Service;

class Modulo2Controller extends BaseController
{
    private $miModulo2Service;
    public function __construct() {
        $this->miModulo2Service = new Modulo2Service();
    }
    public function index()
    {
        return view('Modulo/Modulo2View');
    }
}
