<?php

    // creamos una clase para realizar la conexion a la base de datos

    class Database
    {
        // Variable para declarar el parametro del servidor
        private $localhost = "localhost";
        // Variable para declarar el parametro del nombre de la base de datos
        private $namedatabase = "listado_maestro";

        // Variable para declarar el parametro del nombre de usuario
        private $username = "root";

        // Variable para declarar el parametro de la contraseña de usuario
        private $userpassword = "";

        // Variable para declarar el parametro de los caracteres 
        private $charset ="utf8";

        // MANEJO DE EXCEPCIONES TRY AND CATCH


        function conectar()
        {
            try{
                $connection = "mysql:host=".$this->localhost.";dbname=".$this->namedatabase.";charset=".$this->charset;
                $option=[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];

                $pdo= new PDO($connection,$this->username,$this->userpassword,$option);
                return $pdo;

            }catch(PDOException $e ){
                echo 'ERROR DE CONEXION A LA BASE DE DATOS:'.$e ->getMessage();
                exit;
            }
        }
    }


?>