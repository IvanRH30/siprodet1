<?php

namespace App\Models;

use CodeIgniter\Model;

class PermisosModel extends Model
{
    //indicamos la tabla con la que debe interactuar y los campos de la tabla
    protected $table = 'cat_permisos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'escritura',
        'lectura',
        'eliminacion',
        'actualizacion',
        'fk_cat_rol',
        'fk_cat_modulo',

    ];
    protected $returnType = "object";

    protected $ramasSoftDeletes = true;

    public function getPermisosRol($id)
    {
        $datos = $this->select ('cat_permisos.*, cat_rol.descripcion, cat_modulo.descripcion')
        ->join ('cat_rol','cat_rol.id = cat_permisos.fk_cat_rol','LEFT')
        ->join ('cat_modulo','cat_modulo.id = cat_permisos.fk_cat_modulo','LEFT')
        ->where('fk_cat_rol',$id)
        ->findAll();
        return $datos;
    }
    public function getPermisosUsuario($id){
        $datos = $this->select('usuario.fk_cat_rol, cat_permisos.id, cat_permisos.fk_cat_modulo, cat_modulo.descripcion')
        ->join('cat_rol','cat_rol.id = cat_permisos.fk_cat_rol','LEFT')
        ->join('cat_modulo','cat_modulo.id = cat_permisos.fk_cat_modulo','LEFT')
        ->join('usuario','usuario.fk_cat_rol = cat_rol.id','LEFT')
        ->where('usuario.id', $id)
        ->findAll();

        return $datos;
    }

}