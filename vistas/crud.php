<?php 
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel = "stylesheet" href = "./css/main_design.css">
    <title>PDS2 - CRUD</title>
</head>
<body>

    <div class="nav_div">
      <h1 class="welcome_message_name">
          Bienvenido, <?php echo $user->getName();?>
      </h1>

      <h2>
        Base de datos de los héroes de acción más importantes de todos los tiempos.
      </h2>
      
      <button type="button" class="btn btn-dark"><a href = "./include/logout.php" style = "text-decoration: none; color: white;">Cerrar sesión</a></button>
    </div>
    
    <div class="main_table">

      <?php 
        include_once("include/db.php");

        $DB = new DB();

        $query_string = "SELECT 
                        id_susuario,
                        nombre_susuario,
                        apellido_susuario,
                        nacimiento_susuario
                        FROM super_usuarios
                        ORDER BY id_susuario ASC;";
        
        $database_connection = $DB->connect();

        $query_result = pg_query($query_string);

        if ($query_result) {
            echo 
            '<table class="table table-bordered" style="border: 1px; color: white;"
                <thead class="thead-dark">
                  <tr class="bg-primary" style="text-align: center;">
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">Fecha de nacimiento</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Eliminar</th>
                  </tr>
                </thead>';

                $fetch_results = pg_fetch_all($query_result);

                foreach($fetch_results as $row) {
                  echo 
                  "\n<tbody>
                      
                      <tr class='table-light' style='text-align:center;'>
                      <td scope='row' style='padding-left: 2rem'>{$row['nombre_susuario']}</td>
                      <td scope='row' style='padding-left: 2rem'>{$row['apellido_susuario']}</td>
                      <td scope='row' style='padding-left: 2rem'>{$row['nacimiento_susuario']}</td>

                      <td><a class='update_anchor' href='./vistas/update_form.php?id_susuario={$row['id_susuario']}' onclick='return confirm(\"¿Deseas editar?\")'>Editar</a></td>
                      <td><a class='delete_anchor' href='./include/delete.php?id_susuario={$row['id_susuario']}' onclick='return confirm(\"¿Deseas eliminar?\")'>Eliminar</a></td>
                      </tr>"
                  ;
                }

          echo 
          "</table>";

          echo 
          '<div class="new_insertion_div">
      
          <button type="button" class="btn btn-danger" onclick = "openForm()">+ Nuevo</button>
          
          <div id="insertion_form" style = "margin-top: 2rem; width: 25%; border: 1px solid black; border-radius: 5px;">
    
            <form method = "post" action = "./include/add_todb.php" name = "register_form" style = "width: 90%; margin: 1rem;" onsubmit = "return newRegister()">
              <label for = "new_username">Nombre(s)</label>
              <br>
              <input type = "text" id = "new_username" name = "new_username" placeholder = "Nombre(s)..." autocomplete = "off">
              <br>
              
              <div id = "new_user_validation_error">
                ERROR
              </div>
    
              <label for = "new_lastname_1">Apellido</label>
              <br>
              <input type = "text" id = "new_lastname_1" name = "new_lastname_1" placeholder = "Primer Apellido..." autocomplete = "off">
              <br>
    
              <div id = "new_lastname1_validation_error">
                ERROR
              </div>
    
              <label for = "new_birthdate">Fecha de nacimiento</label>
              <br>
              <input type = "date" id = "new_birthdate" name = "new_birthdate" autocomplete = "off">
              <br>
    
              <div id = "new_birthdate_validation_error">
                ERROR
              </div>
    
              <input type = "submit" value = "Registrar">
    
            </form>
          </div>
    
        </div>';

        } else {
          echo "No hay datos por mostrar.";
        }
      ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src = "./js_scripts/crud_scripts.js"></script>

</body>
</html>