<?php
require_once '../Modelo/justificacionalumno.php';
require_once '../Modelo/usuario.php';

class justificacionalumnoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new justificacionalumno();
    }

    public function Index(){
        require_once '../Vista/Justificacion/justificacionalumno.php';

    }

    public function Crud(){
        $pvd = new justificacionalumno();

        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        require_once '../Vista/editar-justificacionalumnos.php';
	}
	
	//Llamado a la vista justificacionalumno-perfil
    public function Perfil(){
        $pvd = new justificacionalumno();

        //Se obtienen los datos del justificacionalumno.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/perfil-justificacionalumno.php';
	}

    //Llamado a la vista justificacionalumno-nuevo
    public function Justificar(){
        $pvd = new justificacionalumno();

        //Llamado de las vistas.
        require_once '../Vista/Justificacion/justificacionalumno.php';

    }

    //Método que registrar al modelo un nuevo proveedor.
    public function EnviarJustificacion(){
        $pvd = new justificacionalumno();
        $pvd->estudiante_id = $_REQUEST['cbx_estudiante'];
        $pvd->justificado = $_REQUEST['justificado'];
        $this->model->JustificarFormulario($pvd);
        header("Location: ../Vista/Mensaje.php");
    }
	public function EnviarJustificacionA(){
        $pvd = new justificacionalumno();
        $pvd->estudiante_id = $_REQUEST['cbx_estudiante'];
        $pvd->documento_justificacion = $_REQUEST['documento_justificacion'];
        $this->model->JustificarArchivo($pvd);
        header("Location: ../Vista/Mensaje.php");
    }
    public function GuardarArchivo(){
        $pvd = new justificacionalumno();
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
                $pvd->persona_cui = $datos[1];
                $pvd->persona_direccion = utf8_encode($datos[2]);
                $pvd->persona_email = utf8_encode($datos[3]);
				$pc2->usuario_id = $datos[1];
				$pc2->tipo_usuario_id = 3;
				$pc2->estudiante_id = $datos[1];
				$pc2->nombre_acceso = $datos[1];
				$pc2->contrasena_acceso = $hash;
                $this->model->Registrar($pvd);
                $this->model->RegistrarU($pc2);
            }
            $i++;
        }

        header('Location: ../Vista/justificacionalumnoVista.php');
    }
    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new justificacionalumno();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_cui = $_REQUEST['persona_cui'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
 

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/justificacionalumnoVista.php');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/justificacionalumnoVista.php');
    }
}
