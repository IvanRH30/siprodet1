<?php
namespace App\Controllers;

use App\Services\Modulo5Service;

class Modulo5Controller extends BaseController
{
    private $miModulo5Service;
    public function __construct() {
        $this->miModulo5Service = new Modulo5Service();
    }
    public function index()
    {
        return view('Modulo/Modulo5View');
    }
}
