<?php
namespace App\Controllers;

use App\Services\AreasService;

class AreasController extends BaseController{

    private $miAreaService;

    public function __construct(){
        $this->miAreaService = new AreasService;
    }

    public function MostrarAreas(){
        return view ('Areas/NuevaArea');
    }

    private function Validacion(){
        $reglas = [
            'nombre_area' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Nombe del Area</b> es obligatorio', 
                ]
            ],
        ];
        return $this->validate($reglas);
    }
    
    public function AgregarActualizarAreas(){
         $validacion = $this->Validacion();

         if (!$this->request->getMethod()=='POST' || !$validacion){
            $errores = "<p class='text-justify'>";
            foreach ($this->validator->getErrors() as $error) {
                $errores .= "$error<br>";
            }
            $errores .= "</p>";
            $resultado['text'] = $errores;
            $resultado['title'] = 'Error';
            $resultado['icon'] = 'error';
            $resultado['activo'] = false;
         }else{
            $resultado = $this->miAreaService->AgregarActualizarAreas($this->request);
         }
         return json_encode($resultado);
    }

    public function VerAreas(){
        return view('Areas/VerAreas');
    }

    public function GetAreas(){
        $getAreas = $this->miAreaService->GetAreas();
        if($getAreas['activo'] == "t"){
            $areas = $getAreas['areas'];
            foreach ($areas as $area){
                $btnEditar = '<button class="btn btn-secondary btn active"  onclick="editarAreas('. $area->id .')" type="button"> Editar </button>';
                $texto = ($area->activo == "t")? 'Inactiva' : 'Activa';
                $btnEliminar = '<button class="btn btn-primary btn active" onclick="deshabilitarArea('. $area->id .')"  type="button">'.$texto.'</button>';
                $area->acciones = $btnEditar . ' ' . $btnEliminar;
                $area->activo = ($area->activo == "f")? 'Inactiva' : 'Activa';
            }
            $resultado = $getAreas;
            
        }else{
            $resultado = $getAreas;
        }
        return json_encode($resultado);
    }

    public function DeshabilitarHabilitarAreaById($idAreas){
        $resultado = $this->miAreaService->DeshabilitarHabilitarAreaById($idAreas);
        return json_encode($resultado);
    }

    public function GetAreaByID($idAreas){
        $resultado = $this->miAreaService->GetAreaByID($idAreas);
        return json_encode($resultado);
    }
}
