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
            //$resultado['estatus'] = true;
        }else{
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha '.$texto.' el perfil ';
            $resultado['icon'] = 'error';
            //$resultado['estatus'] = false;
        }
        return $resultado;
    }

    public function AgregarPerfil($datos){
        try{
            $infoPerfiles = [
                "nombre" => $datos->getVar('nombre_perfil'),
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
            
            $resultado['perfiles'] =$perfiles;
        } catch(\Exception $th){
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha encontrado perfiles ';
            $resultado['icon'] = 'error';
            
        }
        return $resultado;
    }

    public function GetPerfilByID($idPerfiles){
        $resultado['title'] = 'Error';
        $resultado['icon'] = 'error';
        try{
            $perfil = $this->miPerfilModel->find($idPerfiles);
            if($perfil != null){
                $resultado['title'] = 'Éxito';
                $resultado['text'] = 'Se ha encontrado el perfil correctamente';
                $resultado['icon'] = 'success';
                
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