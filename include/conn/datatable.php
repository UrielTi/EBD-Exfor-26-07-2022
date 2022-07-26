<?php
class ExforDB{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "mysql";
    private $db_name = "ebd_exforsa";
    public $conn;

    public function __construct(){
        $this->conn = new mysqli ($this->db_host, $this->db_user, $this->db_pass, $this->db_name) or die(mysqli_error($this->conn));
        $this->conn->set_charset("utf8");
    }
    //BUSCAR
    public function buscar($tabla, $condicion){
    $resultado = $this->conn->query("SELECT * FROM $tabla WHERE $condicion") or die ($this->conn->error);
    if ($resultado)
        return $resultado->fetch_all(MYSQLI_ASSOC);
    return false;
    }

}
$user = new ExforDB();
$response=array();

$u=$user->buscar("clientes","1");
$response['clientes']=array();
foreach ($u as $key){
    $datos=array();
    foreach ($key as $k => $v)
        $datos[$k] = $v;
    array_push($response['clientes'], $datos);
}
die( json_encode($response));
?>