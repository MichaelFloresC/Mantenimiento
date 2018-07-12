<?php
  require_once '../Modelo/database.php';

  $controller = 'justificacionalumno';

  if(!isset($_REQUEST['c']))
  {
    require_once "../Controlador/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();
  }
  else
  {
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'justificacionalumno';

    require_once "../Controlador/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    call_user_func( array( $controller, $accion ) );
  }
