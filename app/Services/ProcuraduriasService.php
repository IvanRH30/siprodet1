<?php
namespace App\Services;
use App\Models\ProcuraduriasModel;

class ProcuraduriasService {
    private $miProcuraduriaModel;

    public function __construct()
    {
        $this->miProcuraduriaModel = new ProcuraduriasModel();
    }

    public function AgregarActualizarProcuradurias($datos){
        if ($datos->getVar('idProcuradurias') == 0){
            $accion = $this->AgregarProcuraduria($datos);
            $texto = 'guardado';
        }else{
            $accion = $this->ActualizarProcuraduria($datos);
            $texto = 'actualizado';
        }
        if($accion ===true){
            $resultado['title'] = 'Exito';
            $resultado['text'] = 'Se ha '.$texto.' la procuraduria correctamente';
            $resultado['icon'] = 'success';
            //$resultado['estatus'] = true;
        }else{
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha '.$texto.' la procuraduria ';
            $resultado['icon'] = 'error';
            //$resultado['estatus'] = false;
        }
        return $resultado;
    }

    public function AgregarProcuraduria($datos){
        try{
            $infoProcuradurias = [
                "nombre" => $datos->getVar('nombre_procuraduria'),
            ];
            $this->miProcuraduriaModel->insert($infoProcuradurias);
            return true;
        } catch(\Exception $th){
            return false;
        }
    }

    public function ActualizarProcuraduria($datos){
        try{
            $idProcuradurias = $datos->getVar('idProcuradurias');
            $infoProcuraduriaActual = $this->miProcuraduriaModel->find($idProcuradurias);
            $infoProcuraduriaActual->nombre = $datos->getVar('nombre_procuraduria');
            $nuevaInfo = $infoProcuraduriaActual;
            $this->miProcuraduriaModel->update($idProcuradurias, $nuevaInfo);
            return true;
        }catch(\Exception $th){
            return false;
        }
    }

    public function GetProcuradurias(){
        try{
            $procuradurias = $this->miProcuraduriaModel->findAll();
            $resultado['title'] = 'Éxito';
            $resultado['text'] =  'Se han encontrado procuradurias';
            $resultado['icon'] = 'success';
            
            $resultado['procuradurias'] =$procuradurias;
        } catch(\Exception $th){
            $resultado['title'] = 'Error';
            $resultado['text'] = 'No se ha encontrado procuradurias ';
            $resultado['icon'] = 'error';
            
        }
        return $resultado;
    }

    public function GetProcuraduriaByID($idProcuradurias){
        $resultado['title'] = 'Error';
        $resultado['icon'] = 'error';
        try{
            $procuraduria = $this->miProcuraduriaModel->find($idProcuradurias);
            if($procuraduria != null){
                $resultado['title'] = 'Exito';
                $resultado['text'] = 'Se ha encontrado la procuraduria correctamente';
                $resultado['icon'] = 'succes';

                $resultado['procuraduria'] = $procuraduria;
            }else{
                $resultado['text'] = 'No se ha encontrado la procuraduria';
            }
        }catch(\Exception $th){
            $resultado['text'] = 'Error: ' . $th->getMessage();
            $resultado['icon'] = 'warning';
        }
        return $resultado;
    }
}