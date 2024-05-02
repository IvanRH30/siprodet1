<?php
namespace App\Services;

use App\Models\NuevoUsuarioModel;

class NuevoUsuarioService{

    private $miNuevoUsuarioModel;

    public function __construct()
    {
        $this->miNuevoUsuarioModel = new NuevoUsuarioModel();
    }

    public function RegistrarActualizarUsuario ($datos){
        if ($datos->getVar('idNuevo') ==0){
            $accion = $this->RegistrarUsuario($datos);
            $texto = 'guardado';
        }else{
            $accion = $this->ActualizarUsuario($datos);
            $texto = 'actualizado';
        }
        if($accion ===true){
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

    public function RegistrarUsuario($datos){
        try{
            $infoUsuario = 
            [
                "strFacultadoId" => $datos->getVar('strFacultado'),
                "numProcuraduriaID" => $datos->getVar('numProcuraduria'),
                "strNombre" => $datos->getVar('strNombre'),
                "strAPaterno" => $datos->getVar('strPaterno'),
                "strAMaterno" => $datos->getVar('strMaterno'),
                "strPassword"  => $datos->getVar('strPassword'),
                "numPerfilId"=> $datos->getVar('strPerfil'),
               "strAreaId" => $datos->getVar('strArea'),
               "strIniciales" => $datos->getVar('strIniciales'),
                "strTitulo"  => $datos->getVar('strTitulo'),
               "numTipoFacultadoId" => $datos->getVar('strNumTipoFacultado'),
                "dtmFechaAlta"  => $datos->getVar('strFechaAlta'),
                "dtmFechaCambio" => $datos->getVar('strFechaCambio'),
                "dtmFechaBaja" => $datos->getVar('strFechaBaja'),
                "numFacultadoAutorizado" => $datos->getVar('strFacultadoAutorizado'),
                "estatus" =>true,
            ];
            $this->miNuevoUsuarioModel->insert($infoUsuario);
            return true;
        } catch (\Exception $th){
            return false;
        }
    }

    private function ActualizarUsuario($datos){
        try{
            $idNuevo = $datos->getVar('idNuevo');
            $infoUsuarioActual = $this->miNuevoUsuarioModel->find($idNuevo);
            $infoUsuarioActual->strFacultado = $datos->getVar('strFacultado');  
            $infoUsuarioActual->numProcuraduria = $datos->getVar('numProcuraduria');  
            $infoUsuarioActual->strNombre = $datos->getVar('strNombre');
            $infoUsuarioActual->strAPaterno = $datos->getVar('strPaterno');
            $infoUsuarioActual->strAMaterno = $datos->getVar('strMaterno');
            $infoUsuarioActual->strPassword = $datos->getVar('strPassword');
            $infoUsuarioActual->strPerfilId = $datos->getVar('strPerfil');
            $infoUsuarioActual->strArea = $datos->getVar('strArea');
            $infoUsuarioActual->strIniciales = $datos->getVar('strIniciales');
            $infoUsuarioActual->strTitulo = $datos->getVar('strTitulo');
            $infoUsuarioActual->strNumTipoFacultadoId = $datos->getVar('strNumTipoFacultado');
            $infoUsuarioActual->strFechaAlta = $datos->getVar('strFechaAlta');
            $infoUsuarioActual->strFechaCambio = $datos->getVar('strFechaCambio');
            $infoUsuarioActual->strFechaBaja = $datos->getVar('strFechaBaja');
            $infoUsuarioActual->strFacultadoAutorizado = $datos->getVar('strFacultadoAutorizado');
            $nuevaInfo = $infoUsuarioActual;
            $this->miNuevoUsuarioModel->update($idNuevo, $nuevaInfo);
            return true;

        }catch(\Exception $th){
            return false;
        }
    }

    public function GetUsuarios(){
        try{
            $usuarios = $this->miNuevoUsuarioModel->findAll();
            $resultado['tile'] = 'Éxito';
            $resultado['text'] =  'Se han encontrado usuarios';
            $resultado['icon'] = 'success';
            $resultado['estatus'] = true;
            $resultado['usuarios'] =$usuarios;
        }catch(\Exception $th){
            $resultado['tile'] = 'Error';
            $resultado['text'] = 'No se han encontrado usuarios ';
            $resultado['icon'] = 'error';
            $resultado['estatus'] = false;

        }
        return $resultado;
    }

    public function DeshabilitarHabilitarUsuario($idUsuario)
    {
        try {
            $usuario = $this->miNuevoUsuarioModel->find($idUsuario);
            $usuario->estatus = ($usuario->estatus == "t") ? false : true;
            $this->miNuevoUsuarioModel->update($idUsuario,$usuario);
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
            $usuario = $this->miNuevoUsuarioModel->find($idUsuario);
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