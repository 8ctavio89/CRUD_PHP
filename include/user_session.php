<?php

    class UserSession {

        public function __construct() {

            session_start();

        }

        public function setCurrentUser($username) {
            $_SESSION['username'] = $username;
        }

        public function getCurrentUser() {
            return $_SESSION['username'];
        }

        public function closeSession() {
            session_unset();
            session_destroy();
        }
    }

?>