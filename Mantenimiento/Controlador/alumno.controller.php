<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/alumno.php';
require_once '../Modelo/usuario.php';

class AlumnoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new alumno();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/lista-alumnos.php';

    }

    //Llamado a la vista alumno-editar
    public function Crud(){
        $pvd = new alumno();

        //Se obtienen los datos del alumno a editar.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/editar-alumnos.php';
	}
	
	//Llamado a la vista alumno-perfil
    public function Perfil(){
        $pvd = new alumno();

        //Se obtienen los datos del alumno.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/perfil-alumno.php';
	}

    //Llamado a la vista alumno-nuevo
    public function Nuevo(){
        $pvd = new alumno();

        //Llamado de las vistas.
        require_once '../Vista/agregar-alumnos.php';

    }

    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new alumno();
		$pc2 = new usuario();
		$hash = password_hash($_REQUEST['persona_cui'], PASSWORD_BCRYPT);
        //Captura de los datos del formulario (vista).
        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_cui = $_REQUEST['persona_cui'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];

		$pc2->usuario_id = $_REQUEST['persona_cui'];
        $pc2->tipo_usuario_id = 3;
        $pc2->estudiante_id = $_REQUEST['persona_dni'];
		$pc2->nombre_acceso = $_REQUEST['persona_cui'];
        $pc2->contrasena_acceso = $hash;
        
        //Registro al modelo alumno.
        $this->model->Registrar($pvd);
        $this->model->RegistrarU($pc2);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: ../Vista/alumnoVista.php');
    }
    public function GuardarArchivo(){
        $pvd = new alumno();
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

        header('Location: ../Vista/alumnoVista.php');
    }
    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new alumno();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_cui = $_REQUEST['persona_cui'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
 

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/alumnoVista.php');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/alumnoVista.php');
    }
}
