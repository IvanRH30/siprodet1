<?php
namespace App\Controllers;

use App\Services\TipoFacultadoService;

class TipoFacultadoController extends BaseController{
    private $miTipoFacultadoService;

    public function __construct()
    {
        $this->miTipoFacultadoService = new TipoFacultadoService;
    }

    public function MostrarTipoFacultado(){
        return view('TipoFacultado/NuevoTipoFacultado');
    }

    private function Validacion(){
        $reglas = [
            'nombre_tipoFacultado' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Nombe de tipo Facultado</b> es obligatorio', 
                ]
            ],
        ];
        return $this->validate($reglas);
    }
    
    public function AgregarActualizarTipoFacultado(){
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
            $resultado = $this->miTipoFacultadoService->AgregarActualizarTipoFacultado($this->request);
         }
         return json_encode($resultado);

    }

    public function VerTipoFacultados(){
        return view('TipoFacultado/VerTipoFacultado');
    }

    public function GetTipoFacultados(){
        $getTipoFacultados = $this->miTipoFacultadoService->GetTipoFacultados();
        if($getTipoFacultados['activo'] == "t"){
            $tipofacultados = $getTipoFacultados['tipofacultados'];
            foreach ($tipofacultados as $tipofacultado){
                $btnEditar = '<button class="btn btn-secondary btn active"  onclick="editarTiposFacultados('. $tipofacultado->id .')" type="button"> Editar </button>';
                $texto = ($tipofacultado->activo == "t")? 'Inactiva' : 'Activa';
                $btnEliminar = '<button class="btn btn-primary btn active" onclick="deshabilitarTipoFacultado('. $tipofacultado->id .')"  type="button">'.$texto.'</button>';
                $tipofacultado->acciones = $btnEditar . ' ' . $btnEliminar;
                $tipofacultado->activo=($tipofacultado->activo =="f")? 'Inactiva' : 'Activa';
                
            }
            $resultado = $getTipoFacultados;
        }else{
            $resultado = $getTipoFacultados;
        }
        return json_encode($resultado);
    }

    public function DeshabilitarHabilitarById($idTipoFacultados){
        $resultado = $this->miTipoFacultadoService->DeshabilitarHabilitarById($idTipoFacultados);
        return json_encode($resultado);
    }

    public function GetTipoFacultadosByID($idTipoFacultados){
        $resultado = $this->miTipoFacultadoService->GetTipoFacultadosByID($idTipoFacultados);
        return json_encode($resultado);
    }
}