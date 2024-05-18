<?php
namespace App\Services;
use App\Models\TipoFacultadoModel;

class TipoFacultadoService {
    private $miTipoFacultadoModel;

    public function __construct()
    {
        $this->miTipoFacultadoModel = new TipoFacultadoModel();
    }

    public function AgregarActualizarTipoFacultado($datos){
        if ($datos->getVar('idTipoFacultados') == 0){
            $accion = $this->AgregarTipoFacultado($datos);
            $texto = 'guardado';
        }else{
            $accion = $this->ActualizarTipoFacultado($datos);
            $texto = 'actualizado';
        }
        if($accion ===true){
            $resultado['title'] = 'Exito';
            $resultado['text'] = 'Se ha '.$texto.' el tipo de facultado correctamente';
            $resultado['icon'] = 'success';
            //$resultado['estatus'] = true;
        }else{
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha '.$texto.' el tipo de facultado ';
            $resultado['icon'] = 'error';
            //$resultado['estatus'] = false;
        }
        return $resultado;
    }

    public function AgregarTipoFacultado($datos){
        try{
            $infoTipoFacultado = [
                "nombre" => $datos->getVar('nombre_tipoFacultado'),
            ];
            $this->miTipoFacultadoModel->insert($infoTipoFacultado);
            return true;
        } catch(\Exception $th){
            return false;
        }
    }

    public function ActualizarTipoFacultado($datos){
        try{
            $idTipoFacultado = $datos->getVar('idTipoFacultados');
            $infoTipoFacultadoActual = $this->miTipoFacultadoModel->find($idTipoFacultado);
            $infoTipoFacultadoActual->nombre = $datos->getVar('nombre_tipoFacultado');
            $nuevaInfo = $infoTipoFacultadoActual;
            $this->miTipoFacultadoModel->update($idTipoFacultado, $nuevaInfo);
            return true;
        }catch(\Exception $th){
            return false;
        }
    }

    public function GetTipoFacultados(){
        try{
            $tipofacultados = $this->miTipoFacultadoModel->findAll();
            $resultado['title'] = 'Éxito';
            $resultado['text'] =  'Se han encontrado tipos de facultados';
            $resultado['icon'] = 'success';
            
            $resultado['tipofacultados'] =$tipofacultados;
        } catch(\Exception $th){
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha encontrado tipos de facultados ';
            $resultado['icon'] = 'error';
            
        }
        return $resultado;
    }

    public function GetTipoFacultadosByID($idTipoFacultados){
        $resultado['title'] = 'Error';
        $resultado['icon'] = 'erro';
        try{
            $tipofacultado = $this->miTipoFacultadoModel->find($idTipoFacultados);
            if($tipofacultado != null){
                $resultado['title'] = 'Éxito';
                $resultado['text'] = 'Se ha encontrado el tipo de facultado correctamente';
                $resultado['icon'] = 'success';

                $resultado['tipofacultado'];
            }else{
                $resultado['text'] = 'No se ha encontrado el tipo de facultado';
            }
        }catch(\Exception $th){
            $resultado['text'] = 'Error: ' . $th->getMessage();
            $resultado['icon'] = 'warning';
        }
        return $resultado;
    }
}