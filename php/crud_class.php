<?php
include_once 'dbconnection.php';
class User extends DBConnection{
    public $id;
    public $fullname;
    public $card_type;
    public $card_id;
    public $birth_date;
    public $created_at;
    public $updated_at;

    function __construct($jsonValues){
        date_default_timezone_set('America/Bogota');
        $jsonValues = json_decode(file_get_contents("php://input"), true);
        $dateFormat = 'y-m-d H:i:s';
        $this->id         = (isset($jsonValues['id']))      ? $jsonValues['id']         : '';
        $this->fullname   = (isset($jsonValues['fullname']))   ? $jsonValues['fullname']   : '';
        $this->card_type  = (isset($jsonValues['card_type']))  ? $jsonValues['card_type']  : '';
        $this->card_id    = (isset($jsonValues['card_id']))    ? $jsonValues['card_id']    : '';
        $this->birth_date = (isset($jsonValues['birth_date'])) ? $jsonValues['birth_date'] : null;
        $this->created_at = date($dateFormat);
        $this->updated_at = date($dateFormat);
    }
    function readUser(){
        $connection = $this->connect();
        $query = "SELECT
                    id, fullname, card_type, card_id, birth_date, created_at, updated_at
                  FROM
                    users
                  /*WHERE card_id = $this->card_id */";
        try {
            $prepared = $connection->prepare($query);
        } catch (Exception $e) {
            die ( $e );
        }
        $result = $prepared->execute();
        if( !$result ){
            die( "Error, no se hizo la lectura: ". print_r($prepared->errorInfo()) );
        }
        $data=$prepared->fetch(PDO::FETCH_OBJ);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    function updateUser(){
        $connection = $this->connect();
        $query = "UPDATE
                    users  
                  SET
                    fullname='$this->fullname', card_type='$this->card_type', card_id='$this->card_id',   birth_date='$this->birth_date',
                    updated_at='$this->updated_at' 
                  WHERE id='$this->id' ";
        try {
            $prepared = $connection->prepare($query);
        } catch (Exception $e) {
            die ( $e );
        }
        $result = $prepared->execute();
        if( !$result ){
            die( "Error, no se hizo la actualizacion: ". print_r($prepared->errorInfo()) );
        }
        $data=$prepared->fetch(PDO::FETCH_OBJ);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}

?>