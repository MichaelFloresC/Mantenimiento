<?php

require_once '../Modelo/curso.php';

class CursoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new curso();
    }

    public function Index(){
        require_once '../Vista/lista-cursos.php';

    }
}
