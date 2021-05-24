<?php
    class DBConnection{
        private $server   = 'localhost';
        private $dbName   = 'test_form';
        private $user     = 'root';
        private $password = '';
        public function connect(){
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
            try{
                $connection = new PDO("mysql:host=$this->server; dbname=$this->dbName", $this->user, $this->password, $options);
                return $connection;                    
            }catch (Exception $e){
                die("El error de Conexión es: ". $e->getMessage());
            }
        }
    }
?>