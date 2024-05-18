<?php
namespace App\Controllers;
use App\Services\PerfilesService;

class PerfilesController extends BaseController{
     private $miPerfilesService;

     public function __construct()
     {
        $this->miPerfilesService = new PerfilesService;
     }

     public function MostrarPerfiles(){
        return view('Perfiles/NuevoPerfil');
     }

     private function Validacion(){
        $reglas = [
            'nombre_perfil' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Nombe del perfil</b> es obligatorio', 
                ]
            ],
        ];
        return $this->validate($reglas);
     }

     public function AgregarActualizarPerfiles(){
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
        }else{
           $resultado = $this->miPerfilesService->AgregarActualizarPerfiles($this->request);
        }
        return json_encode($resultado);
     }

     public function VerPerfiles(){
        return view('Perfiles/VerPerfiles');
     }

     public function GetPerfiles(){
        $getPerfiles = $this->miPerfilesService->GetPerfiles();
        $perfiles = $getPerfiles['perfiles'];
        foreach ($perfiles as $perfil){
            $btnEditar = '<button class="btn btn-secondary btn active"  onclick="editarPerfiles('. $perfil->id .')" type="button"> Editar </button>';
            $perfil->acciones = $btnEditar;
        }
        $resultado = $getPerfiles;
        return json_encode($resultado);
     }

     public function GetPerfilByID($idPerfiles){
      $resultado = $this->miPerfilesService->GetPerfilByID($idPerfiles);
      return json_encode($resultado);
     }
}