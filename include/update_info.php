<?php

    include_once("../include/db.php");
    $DB = new DB();

    $database_connection = $DB->connect();

    $UPDATED_USERNAME = $_POST["name_update"];
    $UPDATED_LASTNAME = $_POST["lastname_update"];
    $UPDATED_BIRTHDATE = $_POST["birthdate_update"];
    
    $string_query = "UPDATE super_usuarios SET
                     nombre_susuario = $1,
                     apellido_susuario = $2,
                     nacimiento_susuario = $3
                     WHERE id_susuario = $4;";
    
    try {
        $query_result = pg_query_params($database_connection,
                                        $string_query,
                                        array("$UPDATED_USERNAME",
                                              "$UPDATED_LASTNAME",
                                              "$UPDATED_BIRTHDATE",
                                              $_POST["id_update"]));
        pg_close($database_connection);
        header("location:../index.php");
    } catch (Exception $exc) {
        pg_close($database_connection);
        echo "Hubo un error al intentar hacer la actualización de datos: {$exc}";
    }
?>