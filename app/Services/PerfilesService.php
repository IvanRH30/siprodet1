<?php
namespace App\Services;
use App\Models\PerfilesModel;

class PerfilesService {
    private $miPerfilModel;

    public function __construct()
    {
        $this->miPerfilModel = new PerfilesModel();
    }

    public function AgregarActualizarPerfiles($datos){
        if ($datos->getVar('idPerfiles') == 0){
            $accion = $this->AgregarPerfil($datos);
            $texto = 'guardado';
        }else{
            $accion = $this->ActualizarPerfil($datos);
            $texto = 'actualizado';
        }
        if($accion ===true){
            $resultado['title'] = 'Exito';
            $resultado['text'] = 'Se ha '.$texto.' el perfil correctamente';
            $resultado['icon'] = 'success';
            $resultado['activo'] = true;
        }else{
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha '.$texto.' el perfil ';
            $resultado['icon'] = 'error';
            $resultado['activo'] = false;
        }
        return $resultado;
    }

    public function AgregarPerfil($datos){
        try{
            $infoPerfiles = [
                "nombre" => $datos->getVar('nombre_perfil'),
                "num_nivel_seguridad" => $datos->getVar('nivel_seguridad'),
                "activo" => true,
                /*"facultado_modificacion" => $datos->getVar(''),
                "fecha_alta" => $datos->getVar(''),
                "feha_cambio" => $datos->getVar(''),
                "fecha_baja" => $datos->getVar(''),*/
            ];
            $this->miPerfilModel->insert($infoPerfiles);
            return true;
        } catch(\Exception $th){
            return false;
        }
    }

    public function ActualizarPerfil($datos){
        try{
            $idPerfiles = $datos->getVar('idPerfiles');
            $infoPerfilActual = $this->miPerfilModel->find($idPerfiles);
            $infoPerfilActual->nombre = $datos->getVar('nombre_perfil');
            $infoPerfilActual->num_nivel_seguridad = $datos->getVar('nivel_seguridad');
            $nuevaInfo = $infoPerfilActual;
            $this->miPerfilModel->update($idPerfiles, $nuevaInfo);
            return true;
        }catch(\Exception $th){
            return false;
        }
    }

    public function GetPerfiles(){
        try{
            $perfiles = $this->miPerfilModel->findAll();
            $resultado['title'] = 'Éxito';
            $resultado['text'] =  'Se han encontrado perfiles';
            $resultado['icon'] = 'success';
            $resultado['activo'] = true;
            $resultado['perfiles'] =$perfiles;
        } catch(\Exception $th){
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha encontrado perfiles ';
            $resultado['icon'] = 'error';
            $resultado['activo'] = false;
            
        }
        return $resultado;
    }

    public function DeshabilitarHabilitarPerfilById($idPerfiles){
        try{
            $perfil = $this->miPerfilModel->find($idPerfiles);
            $perfil->activo = ($perfil->activo == "t") ? false : true;
            $this->miPerfilModel->update( $idPerfiles, $perfil);
            $texto = ($perfil->activo == "t")? 'Activa' : 'Inactiva';
            $resultado['title'] = 'Éxito';
            $resultado['text'] = 'Se ha ' . $texto . ' el perfil correctamente';
            $resultado['icon'] = 'success';
            $resultado['activo'] = true;

        }catch(\Exception $th){
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha ' . $texto . '  el perfil ';
            $resultado['icon'] = 'error';
            $resultado['activo'] = false;
        }
        return $resultado;
    }

    public function GetPerfilByID($idPerfiles){
        $resultado['title'] = 'Error';
        $resultado['activo'] = false;
        $resultado['icon'] = 'error';

        try{
            $perfil = $this->miPerfilModel->find($idPerfiles);
            if($perfil != null){
                $resultado['title'] = 'Éxito';
                $resultado['text'] = 'Se ha encontrado el perfil correctamente';
                $resultado['icon'] = 'success';
                $resultado['activo'] = true;
                $resultado['perfil'] = $perfil;
            }else{
                $resultado['text'] = 'No se ha encontrado el perfil';
            }
        }catch(\Exception $th){
            $resultado['text'] = 'Error: ' . $th->getMessage();
            $resultado['icon']  = 'warning';
        }
        return $resultado;
    }
}