<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Personas</title>
    </head>
    <body>
        <?php
            foreach ($datos as $dato) {
                echo $dato["usuario_cuenta"]."<br/>";
            }
        ?>
    </body>
</html>