<?php 
    include_once("./db.php");

    $DB = new DB();
    $database_connection = $DB->connect();

    $POST_USERNAME = $_POST["new_username"];
    $POST_USERNAME_LASTNAME = $_POST["new_lastname_1"];
    $POST_USERNAME_BIRTHDATE = $_POST["new_birthdate"];

    $string_query = "INSERT INTO super_usuarios(
                     nombre_susuario,
                     apellido_susuario,
                     nacimiento_susuario)
                     VALUES
                     ($1, $2, $3);";
    
    try {
        $query_result = pg_query_params($database_connection, 
                                        $string_query,
                                        array("$POST_USERNAME", 
                                              "$POST_USERNAME_LASTNAME", 
                                              "$POST_USERNAME_BIRTHDATE"));
        
        pg_close($database_connection);
        header("location:../index.php");
        die();
    } catch (Exception $exc) {
        pg_close($database_connection);
        echo "Hubo un error al intentar ingresar los datos: \n{$exc}";
    }
    
?>