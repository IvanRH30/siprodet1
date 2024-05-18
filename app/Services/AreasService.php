<?php
namespace App\Services;
use App\Models\AreasModel;

class AreasService {

    private $miAreaModel;

    public function __construct(){
        $this->miAreaModel = new AreasModel();
    }

    public function AgregarActualizarAreas($datos){
        if ($datos->getVar('idAreas') == 0){
            $accion = $this->AgregarArea($datos);
            $texto = 'guardado';
        }else{
            $accion = $this->ActualizarArea($datos);
            $texto = 'actualizado';
        }
        if($accion ===true){
            $resultado['title'] = 'Exito';
            $resultado['text'] = 'Se ha '.$texto.' el area correctamente';
            $resultado['icon'] = 'success';
            //$resultado['estatus'] = true;
        }else{
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha '.$texto.' el area ';
            $resultado['icon'] = 'error';
            //$resultado['estatus'] = false;
        }
        return $resultado;
    }

    public function AgregarArea($datos){
        try{
            $infoAreas = [
                
                "nombre" => $datos->getVar('nombre_area'),
            ];
            $this->miAreaModel->insert($infoAreas);
            return true;
        } catch(\Exception $th){
            return false;
        }
    }

    public function ActualizarArea($datos){
        try{
            $idAreas = $datos->getVar('idAreas');
            $infoAreaActual = $this->miAreaModel->find($idAreas);
            $infoAreaActual->nombre = $datos->getVar('nombre_area');
            $nuevaInfo = $infoAreaActual;
            $this->miAreaModel->update($idAreas, $nuevaInfo);
            return true;
        }catch(\Exception $th){
            return false;
        }
    }

    public function GetAreas(){
        try{
            $areas = $this->miAreaModel->findAll();
            $resultado['title'] = 'Éxito';
            $resultado['text'] =  'Se han encontrado areas';
            $resultado['icon'] = 'success';
            
            $resultado['areas'] =$areas;
        } catch(\Exception $th){
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha encontrado areas ';
            $resultado['icon'] = 'error';
            
        }
        return $resultado;
    }
    
    public function GetAreaByID($idAreas){
        $resultado['title'] = 'Error';
        $resultado['icon'] = 'error';
        try{
            $area = $this->miAreaModel->find($idAreas);
            if($area != null){
                $resultado['title'] = 'Éxito';
                $resultado['text'] = 'Se ha encontrado a el usuario correctamente';
                $resultado['icon'] = 'success';
                
                $resultado['area'] = $area;
            }else{
                $resultado['text'] = 'No se ha encontrado el area';
            }
        }catch(\Exception $th){
            $resultado['text'] = 'Error: ' . $th->getMessage();
            $resultado['icon']  = 'warning';
        }
        return $resultado;
    }

}