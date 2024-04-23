<?php
namespace App\Controllers;

use App\Services\PruebaService;

class PruebaController extends BaseController
{
    private $miPruebaService;

    public function __construct() {
        $this->miPruebaService = new PruebaService;
    }

    public function AgregarActualizarUsuario()
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
            $resultado['estatus'] = false;
        }else{
            $resultado = $this->miPruebaService->AgregarActualizarUsuario($this->request);
        }
        return json_encode($resultado);
    }
    private function Validacion()
    {
        $reglas =
        [
            'nombre' =>
            [
                'rules' => ['required','alpha_space'],
                'errors'=> [
                    'alpha_space' => 'El campo <b>Nombre</b> solo puede contener letras y espacios',
                    'required' => 'El campo <b>Nombre</b> es obligatorio',
                ]
            ],
            'apellido_paterno' =>
            [
                'rules' => ['required','alpha_space'],
                'errors'=> [
                    'alpha_space' => 'El campo <b>Apellido Paterno</b> solo puede contener letras y espacios',
                    'required' => 'El campo <b>Apellido Paterno</b> es obligatorio',
                ]
            ],
            'apellido_materno' =>
            [
                'rules' => ['required','alpha_space'],
                'errors'=> [
                    'alpha_space' => 'El campo <b>Apellido Materno</b> solo puede contener letras y espacios',
                    'required' => 'El campo <b>Apellido Materno</b> es obligatorio',
                ]
            ],
            'email' =>
            [
                'rules' => ['required','valid_email'],
                'errors' => 
                [
                    'required' => 'El campo <b>Correo</b> es obligatorio',
                    'valid_email' => 'El campo <b>Correo</b> no es valido'
                ]
            ],
            'password1' =>
            [
                'rules' => ['required','regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[-!@#$%^&*()_+|~=`{}\[\]:";\'<>?,.\/])(?!.*[áéíóúüñÁÉÍÓÚÜÑ]).{8,}$/]'],
                'errors'=> [
                    'required' => 'El campo <b>Contraseña </b> es obligatorio',
                    'regex_match' => 'El campo <b>Contraseña </b>debe tener al menos un numero, un signo, y una letra mayúscula y 8 caracteres',
                ]
            ],
        ];
        return $this->validate($reglas);
    }
    public function VerUsuarios()
    {
        if (session()->get('_id_usuario') == null) {
            return redirect()->route('/');
        }else{
            return view('prueba/VerUsuarios');
        }
    }
    public function GetUsuarios()
    {
        $getUsuarios = $this->miPruebaService->GetUsuarios();
        if ($getUsuarios['estatus'] == "t") {
            $usuarios = $getUsuarios['usuarios'];
            foreach ($usuarios as $usuario) {
                $btnEditar = '<button class="btn btn-secondary btn active"  onclick="editarUsuario('. $usuario->id .')" type="button"> Editar </button>';
                $texto = ($usuario->estatus == "t")? 'Deshabilitar' : 'Habilitar';
                $btnEliminar = '<button class="btn btn-primary btn active" onclick="deshabilitarUsuario('. $usuario->id .')"  type="button">'.$texto.'</button>';
                $usuario->acciones = $btnEditar . ' ' . $btnEliminar;
                $usuario->estatus = ($usuario->estatus == "f") ? 'Deshabilitado' : 'Habilitado'; 
            }
            $resultado = $getUsuarios;
        }else{
            $resultado = $getUsuarios;
        }
        
        echo json_encode($resultado,JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function DeshabilitarHabilitarUsuarioById($idUsuario)
    {
        $resultado = $this->miPruebaService->DeshabilitarHabilitarUsuario($idUsuario);
        echo json_encode($resultado);
        exit();

    }
    public function GetUsuarioByID($idUsuario){
        $resultado = $this->miPruebaService->GetUsuarioByID($idUsuario);
        echo json_encode($resultado);
        exit();
    }
}
