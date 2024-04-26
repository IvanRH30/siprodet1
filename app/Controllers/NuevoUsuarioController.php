<?php 
namespace App\Controllers;

use App\Services\NuevoUsuarioService;

class NuevoUsuarioController extends BaseController{
    /*public function muestra(){
        return view('NuevosUsuarios/usuarioNuevo');
    }*/

    private $miNuevoUsuarioService;

    public function __construct(){
        $this->miNuevoUsuarioService = new NuevoUsuarioService;
    }
    
    public function RegistrarActualizarUsuario(){
        $validacion = $this->Validacion();
        if(!$this->request->getMethod() == 'POST' || !$validacion){
            $errores = "<p class='text-justify'>";
            foreach ($this->validator->getErrors() as $error){
                $errores .="$error<br>";
            }
            $errores .= "</p>";
            $resultado['text'] = $errores;
            $resultado['title'] = 'Error';
            $resultado['icon'] = 'error';
            $resultado['estatus']= false;
        }else{
            $resultado = $this->miNuevoUsuarioService->RegistrarActualizarUsuario($this->request);
        }
        return json_encode($resultado);
    }
    public function GetFormularioRegistraUsuario()
    {
        return view("NuevosUsuarios/usuarioNuevo");
    }
    private function Validacion(){

        $reglas = 
        [
            'strFacultado' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Facultado </b> es obligatorio'

                ]
            ],
            'numProcuraduria' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Numero de Procuraduria </b> es obligatorio'

                ]
            ],
            'strNombre' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Nombre </b> es obligatorio'

                ]
            ],
            'strPaterno' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Apellido Paterno </b> es obligatorio'

                ]
            ],
            'strMaterno' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Apellido Materno </b> es obligatorio'

                ]
            ],
            'strPassword' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Password </b> es obligatorio'

                ]
            ],
            'strPerfil' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Numero de Perfil </b> es obligatorio'

                ]
            ],
            'strArea' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Area</b> es obligatorio'

                ]
            ],
            'strIniciales' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Iniciales </b> es obligatorio'

                ]
            ],
            'strTitulo' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Titulo </b> es obligatorio'

                ]
            ],
            'strNumTipoFacultado' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Numero tipo Facultado </b> es obligatorio'

                ]
            ],
            'strFechaAlta' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Fecha Alta </b> es obligatorio'

                ]
            ],
            'strFechaCambio' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Fecha Cambio </b> es obligatorio'

                ]
            ],
            'strFechaBaja' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Fecha Baja </b> es obligatorio'

                ]
            ],
            'strFacultadoAutorizado' =>
            [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'El campo <b>Facultado Autorizado </b> es obligatorio'

                ]
            ],
        ];
        return $this->validate($reglas);
    }

    public function VerUsuarios(){
        return view('NuevosUsuarios/VerUsuario');
    }

    public function GetUsuarios(){
        $getUsuarios = $this->miNuevoUsuarioService->GetUsuarios();
        if ($getUsuarios['estatus'] === true) {
            $usuarios = $getUsuarios['usuarios'];
            foreach ($usuarios as $usuario) {
                $btnEditar = '<button class="btn btn-secondary btn active"  onclick="editarUsuario('. $usuario->id .')" type="button"> Editar </button>';
                
                $btnEliminar = '<button class="btn btn-primary btn active" onclick="deshabilitarUsuario('. $usuario->id .')"  type="button">Desabilitado</button>';
                $usuario->acciones = $btnEditar . ' ' . $btnEliminar;
                
            }
            $resultado = $getUsuarios;
        }else{
            $resultado = $getUsuarios;
        }
        
        echo json_encode($resultado);
        
    }
    
}