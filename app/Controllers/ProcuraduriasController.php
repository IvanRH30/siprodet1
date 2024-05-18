<?php

namespace App\Controllers;

use App\Services\ProcuraduriasService;

class ProcuraduriasController extends BaseController
{
    private $miProcuraduriaService;

    public function __construct()
    {
        $this->miProcuraduriaService = new ProcuraduriasService;
    }

    public function MostrarProcuraduria()
    {
        return view('Procuradurias/NuevaProcuraduria');
    }

    private function Validacion()
    {
        $reglas = [
            'nombre_procuraduria' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Nombe del Area</b> es obligatorio',
                ]
            ],
        ];
        return $this->validate($reglas);
    }

    public function AgregarActualizarProcuradurias()
    {
        $validacion = $this->Validacion();

        if (!$this->request->getMethod() == 'POST' || !$validacion) {
            $errores = "<p class='text-justify'>";
            foreach ($this->validator->getErrors() as $error) {
                $errores .= "$error<br>";
            }
            $errores .= "</p>";
            $resultado['text'] = $errores;
            $resultado['title'] = 'Error';
            $resultado['icon'] = 'error';
        } else {
            $resultado = $this->miProcuraduriaService->AgregarActualizarProcuradurias($this->request);
        }
        return json_encode($resultado);
    }

    public function VerProcuradurias()
    {
        return view('Procuradurias/VerProcuradurias');
    }

    public function GetProcuradurias()
    {
        $getProcuradurias = $this->miProcuraduriaService->GetProcuradurias();
        $procuradurias = $getProcuradurias['procuradurias'];
        foreach ($procuradurias as $procuraduria) {
            $btnEditar = '<button class="btn btn-secondary btn active"  onclick="editarProcuradurias('. $procuraduria->id .')" type="button"> Editar </button>';
            $procuraduria->acciones = $btnEditar;
        }
        $resultado = $getProcuradurias;
        return json_encode($resultado);
    }

    public function GetProcuraduriaByID($idProcuradurias){
        $resultado = $this->miProcuraduriaService->GetProcuraduriaByID($idProcuradurias);
        return json_encode($resultado);
    }
}
