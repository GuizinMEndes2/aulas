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
        $sql = $this->conex->query("SELECT * FROM {$this->table} ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);


    }
    
    public function getById($id){
        $sql = $this->conex->prepare ("SELECT * FROM {$this->table} where id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        $user = $sql->fetch(PDO::FETCH_ASSOC); 
        return $user;
    }
    
    public function create($data) {
        //Inicioa a construção do banco de dados
        $sql = "INSERT INTO {$this-> table}";

        //prepara os campos e placeholders

        foreach(array_keys($data) as $field ) {
            $sql_fields[]= "{$field} = :{$field}";

        }

        $sql_fields = implode(', ', $sql_fields);

        //Monta a consulta
        $sql .= " SET {$sql_fields}";
       
        $insert = $this->conex->prepare($sql);
        var_dump($data);
        
        // //faz os binds
        // foreach ($data as $field => $value) {
        //     $insert->bindValue(":{$field}", $value);
            
        // }
        $insert->execute($data);
        
        return $insert->errorInfo();

        

    }
    

}