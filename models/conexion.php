<?php
    class Conexion{
        public function conectar(){
            $link=new PDO("mysql:host=localhost; dbname=crud_pdo", "root", "");
            return $link;
        }
    }
?>