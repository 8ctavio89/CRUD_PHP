<?php 

    include_once("./user_session.php");

    $user_session = new UserSession();

    if(isset($_SESSION['username'])) {
        include_once("./db.php");

        $DB = new DB();

        $database_connection = $DB->connect();

        $USER_ID = $_GET["id_susuario"];

        $string_query = "DELETE FROM
                     super_usuarios
                     WHERE id_susuario = $1;";
    
        try {
            $query_result = pg_query_params($database_connection,
                                        $string_query,
                                        array($USER_ID));
            pg_close($database_connection);
            header("Location: ../index.php");
            die();
        } catch (Exception $exc) {
            pg_close($database_connection);
            echo "Hubo un error al intentar realizar la petición a la base de datos: {$exc}";
        }
    } else {
        header("Location: ../index.php");
    }
?>