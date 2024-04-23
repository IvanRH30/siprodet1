<?php

namespace App\Services;

use App\Models\{ConfiguraModel, PermisosModel};
use App\Models\UsuarioModel;
use App\Models\CatEstatusModel;

class LoginService
{
    //Creacion de variables
    private $miUsuarioModel;
    private $miPermisosUsuario;
    private $WebConfig;

    public $respuesta;
    public $id_modulo_1 = 0;
    public $id_modulo_2 = 0;
    public $id_modulo_3 = 0;
    public $id_modulo_4 = 0;
    public $id_modulo_5 = 0;
    //Inicializando los Modelos
    public function __construct()
    {
        $this->WebConfig = $WebConfig ?? config('App');
        $this->miUsuarioModel = new UsuarioModel();
        $this->miPermisosUsuario = new PermisosModel();
    }

    public function authenticate($usuarioCorreo, $usuarioPassword)
    {
        $usuarioVerificado = $this->miUsuarioModel->getUsuarioLogin($usuarioCorreo, $usuarioPassword);

        if ($usuarioVerificado != null) {
            if ($usuarioVerificado->estatus != "f") {
                // El usuario se ha verificado, establece la sesión y permisos
                $this->_setUserSession($usuarioVerificado);

                $id_usuario = session()->get('_id_usuario');

                // Obtiene permisos de menú generales
                $permisosUsuario = $this->miPermisosUsuario->getPermisosUsuario($id_usuario);
                $this->_setUserPermisosGral($permisosUsuario);

                $respuesta = [
                    'estatus' => true,
                    'ruta' => 'Inicio',
                    'Alerta' => 'Inicio de sesión EXITOSO',
                    'title' => 'Éxito',
                    'icon' => 'success',
                ];
            }else{
                $respuesta = [
                    'estatus' => false,
                    'ruta' => '/',
                    'text' => 'El usuario se encuentra deshabilitado',
                    'title' => 'Error',
                    'icon' => 'warning',
                ];
            }
        } else {
            // El usuario no existe en la base de datos
            $respuesta = [
                'estatus' => false,
                'title' => 'Error',
                'icon' => 'error',
                'text' => 'El usuario no existe ó las credenciales son incorrectas, verifique su correo y contraseña',
                'ruta' => '/',
            ];
        }
        return $respuesta;
    }
    private function _setUserSession($usuario)
    {
        $SessionData = [
            '_id_usuario'       => $usuario->id,
            '_nombre_usuario'   => $usuario->nombre . " " . $usuario->apellido_paterno . " " . $usuario->apellido_materno,
            '_email_usuario'    => $usuario->email,
            '_id_rol_usuario'   => $usuario->fk_cat_rol,
            'isLoggedIn'        => true,
        ];
        session()->set($SessionData, 'Usuario');
        return true;
    }
    private function _setUserPermisosGral($permisosUsuario)
    {
        for ($i = 0; $i < count($permisosUsuario); $i++) {
            $idPermisoUsuario =   $permisosUsuario[$i]->id;
            if ($permisosUsuario[$i]->fk_cat_modulo == 1) {
                $this->id_modulo_1 = $idPermisoUsuario;
            }
            if ($permisosUsuario[$i]->fk_cat_modulo == 2) {
                $this->id_modulo_2 = $idPermisoUsuario;
            }
            if ($permisosUsuario[$i]->fk_cat_modulo == 3) {
                $this->id_modulo_3 = $idPermisoUsuario;
            }
            if ($permisosUsuario[$i]->fk_cat_modulo == 4) {
                $this->id_modulo_4 = $idPermisoUsuario;
            }
            if ($permisosUsuario[$i]->fk_cat_modulo == 5) {
                $this->id_modulo_5 = $idPermisoUsuario;
            }
        }
        $SessionData =
            [
                '_id_modulo_1'       => $this->id_modulo_1,
                '_id_modulo_2'       => $this->id_modulo_2,
                '_id_modulo_3'       => $this->id_modulo_3,
                '_id_modulo_4'       => $this->id_modulo_4,
                '_id_modulo_5'       => $this->id_modulo_5,
            ];
        session()->set($SessionData, 'PermisoGral');
        return true;
    }
    public function logout()
    {
        session()->destroy();
        return true;
    }
}
