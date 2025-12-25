<?php

class DatabaseConn{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'ma_apparel';
    protected $conn;
    public function __construct()
    {
    }

    public function connect(){
        if($this->conn == null){
        $this->conn = new mysqli($this->host,$this->username,$this->password,$this->database);

        if($this->conn->connect_error){
            die("error". $this->conn->connect_error);
        }
        }
        return $this->conn;
    }

    public function getallData($table){
        $net = $this->connect();
        $safeTable = $net->real_escape_string($table);
        $query = "SELECT * FROM {$safeTable} LIMIT 5";
        $results = $net->query($query);

        return $results;
    }

    public function getLimitData($offset,$limit){
        $conn = $this->connect();
        $sql = "SELECT * FROM data_barang LIMIT ?,?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ii',$offset,$limit);
        $stmt->execute();

        $results = $stmt->get_result();
        return $results;
    }

    public function getDataSelection($table,$column,$name){
        $net = $this->connect();
        $safeTable = $net->real_escape_string($table);
        $safeColumn = $net->real_escape_string($column);
        $query = $net->prepare("SELECT * FROM {$safeTable} WHERE {$safeColumn} LIKE ? LIMIT 5");

        $searchTerm = "%" . $name . "%";
        $query->bind_param("s",$searchTerm);
        $query->execute();

        $results = $query->get_result();
        return $results;
    }
}

$data = new DatabaseConn();
$data->getDataSelection("data_barang","id_barang","kaos");