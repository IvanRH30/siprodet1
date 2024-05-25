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
            $resultado['activo'] = true;
        }else{
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha '.$texto.' el area ';
            $resultado['icon'] = 'error';
            $resultado['activo'] = false;
        }
        return $resultado;
    }

    public function AgregarArea($datos){
        try{
            $infoAreas = [
                
                "nombre" => $datos->getVar('nombre_area'),
                "clave_area" =>$datos->getVar('clave_areas'),
                "telefono_jefe" => $datos->getVar('tel_jefe'),
                "telefono_subjefe" => $datos->getVar('tel_subjefe'),
                "telefono_secretaria" => $datos->getVar('tel_secret'),
                "telefono_fax" => $datos->getVar('tel_fax'),
                "activo" => true,
                /*"fecha_alta" => $datos->getVar(''),
                "feha_cambio" => $datos->getVar(''),
                "fecha_baja" => $datos->getVar(''),
                "facultado_modificacion" => $datos->getVar(''),*/
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
            $infoAreaActual->clave_area = $datos->getVar('clave_areas');
            $infoAreaActual->telefono_jefe  = $datos->getVar('tel_jefe');
            $infoAreaActual->telefono_subjefe  = $datos->getVar('tel_subjefe');
            $infoAreaActual->telefono_secretaria  = $datos->getVar('tel_secret');
            $infoAreaActual->telefono_fax  = $datos->getVar('tel_fax');
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
            $resultado['activo'] = true;
            
            $resultado['areas'] =$areas;
        } catch(\Exception $th){
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha encontrado areas ';
            $resultado['icon'] = 'error';
            $resultado['activo'] = false;
            
        }
        return $resultado;
    }

    public function DeshabilitarHabilitarAreaById($idAreas){
        try{
            $area = $this->miAreaModel->find($idAreas);
            $area->activo = ($area->activo == "t") ? false : true;
            $this->miAreaModel->update( $idAreas, $area);
            $texto = ($area->activo == "t")? 'Activa' : 'Inactiva';
            $resultado['title'] = 'Éxito';
            $resultado['text'] = 'Se ha ' . $texto . ' el area correctamente';
            $resultado['icon'] = 'success';
            $resultado['activo'] = true;

        }catch(\Exception $th){
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha ' . $texto . '  el area ';
            $resultado['icon'] = 'error';
            $resultado['activo'] = false;
        }
        return $resultado;
    }

    
    public function GetAreaByID($idAreas){
        $resultado['title'] = 'Error';
        $resultado['activo'] = false;
        $resultado['icon'] = 'error';
        try{
            $area = $this->miAreaModel->find($idAreas);
            if($area != null){
                $resultado['title'] = 'Éxito';
                $resultado['text'] = 'Se ha encontrado a el usuario correctamente';
                $resultado['icon'] = 'success';
                $resultado['activo'] = true;
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