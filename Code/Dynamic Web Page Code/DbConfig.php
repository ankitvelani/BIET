<?php
class Connection {
   // Member Area
    private $host ,$database,$user,$password;
    private $stmt;
    public $conObj;
            
    
  
    function __construct()
    {
     $this->host="localhost";
        $this->database="cms";
        $this->user="root";
        $this->password="root";
        $this->stmt=NULL;
 
        try{
        	
        	$this->conObj=new PDO("mysql:host=".$this->host.";dbname=".$this->database.";", $this->user, $this->password);
        }
        catch (PDOException $e)
        {
        	print "Error at Connection !: " . $e->getMessage() . "</br>";
        }

    }
  
    function updateData($qry)
    {
 
        try{
            $this->stmt=  $this->conObj->prepare($qry);
            $this->stmt->execute();
            return 1;
        }
        catch (PDOExecption $e){
            $this->conObj->rollback();
            return 0;
        }
    }
    
    
    function deleteData($table,$filter)
    {
        $qry="delete from $table where $filter";
        try{   	
            $this->stmt=  $this->conObj->prepare($qry);
            $this->stmt->execute();
            return 1;
        }
        catch (PDOExecption $e){
            $this->conObj->rollback();
            return 0;
        }
    }
    
    //insert data function
    function putData($qry)
    {
         
        try{   	
            $this->stmt=  $this->conObj->prepare($qry);
            $this->stmt->execute();
            return $this->conObj->lastInsertId();
        }
        catch (PDOExecption $e){
            $this->conObj->rollback();
            return 0;
        }
    }
    //end of the data insert function 
  
    public function getData($qry)
    {  
        $this->stmt= $this->conObj->prepare($qry);
        $this->stmt->execute();
        $row=$this->stmt->fetchAll();
        return $row;
    }
   
    
    
    function __destruct() {
       $this->conObj=NULL;
    }
}

?>
