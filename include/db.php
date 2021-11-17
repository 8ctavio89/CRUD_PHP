<?php
     class DB {
         private $server_host;
         private $database_name;
         private $username;
         private $password;

         public function __construct() {
             $this->server_host     = "ec2-52-201-72-91.compute-1.amazonaws.com";
             $this->database_name   = "dq1vfb8oo6t0k";
             $this->username        = "ekdphcwjyuvndt";
             $this->password        = "25b69a99cbc9e19f18a7e5b76450959c38c4bef11d077653ffa56e7e36d5ddf7";
         }

         function connect() {
             
            try {
                 $connection_string = "host={$this->server_host} dbname={$this->database_name} user={$this->username} password={$this->password}";
                
                $database_connection_object = pg_connect($connection_string)
                or die("A connection could not be established. REASON: ".preg_last_error());

                return $database_connection_object;

             } catch (Exception $ex) {
                
                echo "The connection was not successful. REASON: {$ex}";

             }
         }
     }
?>