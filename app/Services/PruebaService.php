<?php
namespace App\Services;

use App\Models\PruebaModel;

class PruebaService  
{
    private $miPruebaModel;
    public function __construct() {
        $this->miPruebaModel = new PruebaModel();
    }
    public function AgregarActualizarUsuario($datos)
    {
        if ($datos->getVar('idUsuario') == 0) {
            $validaCorreo = $this->CompruebaDuplicidadCorreo($datos->getVar('email'));
            if (!$validaCorreo) {
                $accion = $this->AgregarUsuario($datos);
                $texto = 'guardado';
            }else{
                $resultado['title'] = 'Error';
                $resultado['text'] = 'El correo ya existe, por favor inicie sesión';
                $resultado['icon'] = 'info';
                $resultado['estatus'] = false;
                return $resultado;
            }
        }else{
            $accion = $this->ActualizarUsuario($datos);
            $texto = 'actualizado';
        }
        if ($accion === true) {
            $resultado['title'] = 'Exito';
            $resultado['text'] = 'Se ha '.$texto.' al usuario correctamente';
            $resultado['icon'] = 'success';
            $resultado['estatus'] = true;
        }else{
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha '.$texto.' al usuario ';
            $resultado['icon'] = 'error';
            $resultado['estatus'] = false;
        }
        return $resultado;
    }
    private function AgregarUsuario($datos){
        try {
            $infoUsuario = 
            [
                "nombre"    => $datos->getVar('nombre'),
                "apellido_paterno"  => $datos->getVar('apellido_paterno'),
                "apellido_materno"  => $datos->getVar('apellido_materno'),
                "email" => $datos->getVar('email'),
                "password"  => $datos->getVar('password1'),
                "estatus"  => true,
                "fk_cat_rol"  => 5,
            ];
            $this->miPruebaModel->insert($infoUsuario);
            return true;
        } catch (\Exception $th) {
            return false;
        }
    }
    private function ActualizarUsuario($datos){
        try {
            $idUsuario = $datos->getVar('idUsuario');
            $infoUsuarioActual = $this->miPruebaModel->find($idUsuario);
            $infoUsuarioActual->nombre = $datos->getVar('nombre');
            $infoUsuarioActual->apellido_paterno = $datos->getVar('apellido_paterno');
            $infoUsuarioActual->apellido_materno = $datos->getVar('apellido_materno');
            $infoUsuarioActual->email = $datos->getVar('email');
            $infoUsuarioActual->password = $datos->getVar('password1');
            $nuevaInfo = $infoUsuarioActual;
            $this->miPruebaModel->update($idUsuario,$nuevaInfo);
            return true;
        } catch (\Exception $th) {
            return false;
        }
    }
    private function CompruebaDuplicidadCorreo($correo)
    {
        $correo = $this->miPruebaModel->where('email',$correo)->get()->getResult();
        if (count($correo)>0) {
            return true;
        }else{
            return false;
        }
    }
    public function GetUsuarios(){
        try {
            $usuarios = $this->miPruebaModel->findAll();
            $resultado['title'] = 'Éxito';
            $resultado['text'] = (count($usuarios) > 0) ? 'Se han encontrado usuarios' : 'No se han encontrado usuarios ';
            $resultado['icon'] = 'success';
            $resultado['estatus'] = true;
            $resultado['usuarios'] =$usuarios;
        } catch (\Exception $th) {
                        $resultado['title'] = 'Error';
            $resultado['text'] = 'No se han encontrado usuarios ';
            $resultado['icon'] = 'error';
            $resultado['estatus'] = false;
        }
        return $resultado;         
    }
    public function DeshabilitarHabilitarUsuario($idUsuario)
    {
        try {
            $usuario = $this->miPruebaModel->find($idUsuario);
            $usuario->estatus = ($usuario->estatus == "t") ? false : true;
            $this->miPruebaModel->update($idUsuario,$usuario);
            $texto = ($usuario->estatus == "t") ? 'Deshabilitado' : 'Habilitado';
            $resultado['title'] = 'Éxito';
            $resultado['text'] = 'Se ha '.$texto.' al usuario correctamente';
            $resultado['icon'] = 'success';
            $resultado['estatus'] = true;
        } catch (\Exception $th) {
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha '.$texto.'  al usuario ';
            $resultado['icon'] = 'error';
            $resultado['estatus'] = false;
        }
        return $resultado;
    }
    public function GetUsuarioByID($idUsuario){
        $resultado['title'] = 'Error';
        $resultado['estatus'] = false;
        $resultado['icon'] = 'error';
        try {
            $usuario = $this->miPruebaModel->find($idUsuario);
            if ($usuario != null) {
                $resultado['title'] = 'Éxito';
                $resultado['text'] = 'Se ha encontrado a el usuario correctamente';
                $resultado['icon'] = 'success';
                $resultado['estatus'] = true;
                $resultado['usuario'] = $usuario;
            }else{
                $resultado['text'] = 'No se ha encontrado a el usuario';
            }
        } catch (\Exception $th) {
            $resultado['text'] = 'Error:  ' . $th->getMessage();
            $resultado['icon'] = 'warning';
        }
        return $resultado;
    }
}
