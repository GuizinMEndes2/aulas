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


    public function getAll($where = false, $where_glue = 'AND') {
        if ($where) {
            $where_sql = $this->where_fields($where, $where_glue);

        $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE {$where_sql}");
        $sql->execute($where);
        
    }  else {
        $sql = $this->conex->prepare("SELECT * FROM{$this->table}");
    }
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

        $sql_fields = $this->sql_fields($data);

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

    public function update($data, $id) {

        unset($data['id']);


        $sql = "UPDATE {$this->table}";
        $sql.= ' SET ' . $this->sql_fields($data);
        $sql.= ' WHERE id = :id';
        $data['id'] = $id;

        $upd = $this->conex->prepare($sql);
        $upd ->execute($data);

        

    }
    
    private function map_fields($data){
        {
        foreach(array_keys($data) as $field ) {
            $sql_fields[]= "{$field} = :{$field}";
    
        }
        return $sql_fields;
    }
}

    private function sql_fields($data){
        $sql_fields = $this->map_fields($data);
        return implode(', ', $sql_fields);
        }

    private function where_fields($data, $glue = 'AND')
    {
        $glue = $glue = 'OR' ? ' OR ' : ' AND ';
        $fields = $this->map_fields($data);
        return implode($glue, $fields);
    }
    
        
    }
    
