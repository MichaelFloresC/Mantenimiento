<?php

require_once '../Modelo/profesor.php';
require_once '../Modelo/usuario.php';

class ProfesorController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new profesor();
    }

    public function Index(){
        require_once '../Vista/lista-profesores.php';

    }

    public function Crud(){
        $pvd = new profesor();

        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        require_once '../Vista/editar-profesores.php';
  }

    public function Nuevo(){
        $pvd = new profesor();

        require_once '../Vista/agregar-profesores.php';

    }

    public function Guardar(){
        $pvd = new profesor();
		$pc2 = new usuario();
		$hash = password_hash($_REQUEST['persona_dni'], PASSWORD_BCRYPT);
        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
       
		//$pc2->usuario_id = $_REQUEST['usuario_id'];
        //$pc2->usuario_cuenta = $_REQUEST['persona_dni'];
        //$pc2->usuario_password = $hash;
        //$pc2->usuario_rol_id = $_REQUEST['persona_tipo_id'];
		//$pc2->usuario_persona_id = 1;
        //$pc2->usuario_estado = $_REQUEST['persona_estado'];
        
        $this->model->Registrar($pvd);
		//$this->model->RegistrarU($pc2);

        header('Location: ../Vista/profesorVista.php');
    }

    public function Editar(){
        $pvd = new profesor();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/profesorVista.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/profesorVista.php');
    }
}
