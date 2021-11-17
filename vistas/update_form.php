<?php
    include_once("../include/db.php");

    $query_result = null;
    
    if (isset($_SESSION['username'])) {
      $DB = new DB();
      $database_connection = $DB->connect();
      

      $string_query = "SELECT
                      id_susuario,
                      nombre_susuario,
                      apellido_susuario,
                      nacimiento_susuario
                      FROM super_usuarios
                      WHERE id_susuario = $1;";
    
      try {
          $query_result = pg_query_params($database_connection,
                                        $string_query,
                                        array($_GET["id_susuario"]));
          pg_close($database_connection);
      } catch (Exception $exc) {
          pg_close($database_connection);
          echo "Hubo un error al intentar recuperar los datos: {$exc}";
      }
    } else {
        include_once("../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "../css/main_design.css">
  <title>PDS2 - CRUD</title>
</head>
<body>
  
    <?php
    
        if ($query_result) {

          $fetch_results = pg_fetch_all($query_result);

          foreach($fetch_results as $row) {

              $USER_ID = $row["id_susuario"];
              $USERNAME = $row["nombre_susuario"];
              $LASTNAME = $row["apellido_susuario"];
              $BIRTHDATE = $row["nacimiento_susuario"];

            ?>
            <div class="overlay">
                <div class="popup">
                    <div class="update_window_main_text">
                        <h1>
                            Editar información
                        </h1>
                        <?php echo $USERNAME; ?>
                        <form method="post" name="update_info_form" action="../include/update_info.php">
                            <label>Id</label>
                            <br>
                            <input type="text" id="id_update" name="id_update" autocomplete="off" value="<?php echo htmlentities($USER_ID); ?>" readonly>
                            <br>

                            <label>Nombre</label>
                            <br>
                            <input type="text" id="name_update" name="name_update" autocomplete="off" value="<?php echo htmlentities($USERNAME); ?>" required>
                            <br>

                            <label>Apellido</label>
                            <br>
                            <input type="text" id="lastname_update" name="lastname_update" autocomplete="off" value="<?php echo htmlentities($LASTNAME); ?>" required>
                            <br>

                            <label>Fecha de nacimiento</label>
                            <br>
                            <input type="date" id="birthdate_update" name="birthdate_update" autocomplete="off" value="<?php echo $BIRTHDATE; ?>" required>
                            <br>
                            <br>

                            <input class="bttn-submit-popup" type=submit value="Actualziar"/>
                        </form>
                      </div>
                    </div>
                  </div>
            <?php
          }
        }
    ?>
</body>
</html>