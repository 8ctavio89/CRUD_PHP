<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "./css/main_design.css"/>
    <title>PDS2 - CRUD Log In</title>
</head>
<body>
    <div class="login_center_div">
        <h1 class="welcome_message">
            BIENVENIDO/A
        </h1>

        <br>

        <form method = "post" class = "login_form" name = "login_form" onsubmit = "return validateLogInInfo()">
            <label for = "username">Nombre(s) de usuario</label>
            <br>
            <input type = "text" id = "username" name = "username" placeholder = "Nombre de usuario..." autocomplete = "off">
            <br>

            <div id = "username_validation_error">
                Por favor, completa este campo.
            </div>
            <br>

            <label for = "password">Contraseña</label>
            <br>
            <input type = "password" id = "password" name = "password" placeholder = "Contraseña..." autocomplete = "off">
            <br>

            <div id = "password_validation_error">
                Por favor, completa este campo.
            </div>

            <br>
            
            <?php 
                    if (isset($error_login)) {
                        echo "<div class = 'form_validation_error'>$error_login</div>";
                        echo "<br>";
                    }
            ?>

            <input type = "submit" value = "Log In">
                
            
        </form>
    </div>

    <script src = "./js_scripts/login_validation.js"></script>
</body>
</html>