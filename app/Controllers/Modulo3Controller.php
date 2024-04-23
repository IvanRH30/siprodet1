<?php
namespace App\Controllers;

use App\Services\Modulo3Service;

class Modulo3Controller extends BaseController
{
    private $miModulo3Service;
    public function __construct() {
        $this->miModulo3Service = new Modulo3Service();
    }
    public function index()
    {
        return view('Modulo/Modulo3View');
    }
}
