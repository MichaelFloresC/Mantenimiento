        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="#">Escuela Profesional de Ingenieria de Sistemas</a>
            </div>
			
            <!-- /.navbar-header -->
			<ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
							echo "<i>" . $_SESSION['nombre_acceso']."</i>";
						?>
						<i class="fa fa-user fa-fw"></i>
                    </a>
                    
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Docentes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listaDocente_vista.php">Listado</a>
                                </li>
                                <li>
                                    <a href="registroDocente_vista.php">Nuevo</a>
                                </li>
								<li>
                                    <a href="#">Justificación</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Alumnos -->
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Alumnos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listaAlumno_vista.php">Listado</a>
                                </li>
                                <li>
                                    <a href="registroAlumno_vista.php">Nuevo</a>
                                </li>
								<li>
                                    <a href="#">Justificación</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Alumnos -->						
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Horarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Reprogramación</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Relaciones públicas y dirección -->                       
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Reportes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Alumnos</a>
                                </li>
								<li>
                                    <a href="#">Docentes</a>
                                </li>
								<li>
                                    <a href="#">Cursos</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Malla Curricular -->	
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Malla Curricular<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listaMalla_vista.php">Malla</a>
                                </li>
                                <li>
                                    <a href="cargarMalla_vista.php">Cargar Malla</a>
                                </li>
                                <li>
                                    <a href="listaCursos_vista.php">Lista de cursos</a>
                                </li>
                                <li>
                                    <a href="crearGruposCursos_vista.php">Crear Grupos de cursos</a>
                                </li>
                                <li>
                                    <a href="asignacionGrupos_vista.php">Asignación de Grupos</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


						<li>
                            <a href="logout.php"><i class="fa fa-edit fa-fw"></i> Cerrar Sesión</a>
                        </li>						
						<!-- /Usuarios -->
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.Barra Desplegable Izquierda -->
        </nav>
