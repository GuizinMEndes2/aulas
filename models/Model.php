<?php

class Model{
    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'sistematwig';
    private $port = '3306';
    private $user = 'root';
    private $password = null;

    protected $table;
    protected $conex;

    public function __construct(){
        //Descobre o nome da tabela 
        $tbl = strtolower(get_class($this));
        $tbl.= 's';
        $this-> table = $tbl;

        //conecta no banco de dados
        $this->conex = new PDO("{$this->driver}:host={$this->host};port={$this->port};dbname={$this->dbname}" , $this->user, $this->password);

    } 


    public function getAll(){
        $sql = $this->conex->query("SELECT * FROM {$this-> table}");
        return $sql->fetchAll(PDO::FETCH_ASSOC);


    }
    
    public function GetById($id){
        $sql = $this->conex->prepare ("SELECT * FROM {$this->table} where id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        $user = $sql->fetchAll(PDO::FETCH_ASSOC); 
        return $user;
    }
    
    

}