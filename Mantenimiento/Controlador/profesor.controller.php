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
       
		$pc2->usuario_id = $_REQUEST['usuario_id'];
        $pc2->tipo_usuario_id = 2;
        $pc2->docente_id = $_REQUEST['persona_dni'];
		$pc2->nombre_acceso = $_REQUEST['persona_dni'];
        $pc2->contrasena_acceso = $hash;
        
        $this->model->Registrar($pvd);
		$this->model->RegistrarU($pc2);

        header('Location: ../Vista/profesorVista.php');
    }
	public function GuardarArchivo(){
        $pvd = new profesor();
		$pc2 = new usuario();
        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) { 
            if($i != 0) { 
                $datos = explode(",",$linea);
				$hash = password_hash($datos[1], PASSWORD_BCRYPT);
                $pvd->persona_nombres = utf8_encode($datos[0]);
                $pvd->persona_dni = $datos[1];   
				$pc2->usuario_id = $datos[1];
				$pc2->tipo_usuario_id = 2;
				$pc2->docente_id = $datos[1];
				$pc2->nombre_acceso = $datos[1];
				$pc2->contrasena_acceso = $hash;

				
                $this->model->Registrar($pvd);
				$this->model->RegistrarU($pc2);

            }
            $i++;
        }

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
