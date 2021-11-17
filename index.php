<?php
    include_once("include/user.php");
    include_once("include/user_session.php");

    $user_session = new UserSession();
    $user = new User();

    if (isset($_SESSION['username'])) {
        $user->setUser($user_session->getCurrentUser());
        include_once("vistas/crud.php");

    } else if (isset($_POST['username']) && isset($_POST['password'])) {
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];

        if ($user->userExists($userForm, $passForm)) {
            
            $user_session->setCurrentUser($userForm);
            $user->setUser($userForm);

            include_once("vistas/crud.php");

        } else {
            $error_login = "Error con el formato de los datos.";
            include_once("vistas/user_login.php");
        }

    } else {
        include_once("vistas/user_login.php");
    }
?>