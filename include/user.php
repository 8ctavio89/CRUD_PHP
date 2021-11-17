<?php

    include_once("db.php");
    
    class User extends DB {
        private $username;

        public function userExists($username, $password) {

            $query_string = "SELECT *
                             FROM usuarios_admin
                             WHERE nombre_usuario = $1;";
            
            $database_connection = $this->connect();

            $query_result = pg_query_params($database_connection, $query_string, array("$username"));

            if ($query_result) {
                
                $fetched_results = pg_fetch_all($query_result);

                foreach ($fetched_results as $row) {
                        if (password_verify($password, $row["user_password"])) {
                            return true;
                        }
                    }
                }
            return false;
        }

        public function setUser($username) {
            $this->username = $username;
        }

        public function getName() {
            return $this->username;
        }
    }

?>
