<?php
require_once(dirname(__FILE__).'\safe.php');

class dbconn extends Safe{
	public $connection;
    public $error           = array();

    protected $host, $user, $password, $database;

    public $LastInsertedIds = array();
    public $ConnectionLastId= NULL;

	public function __construct(){
		parent::__construct();
        try{
            $this->host         = "localhost";
            $this->user         = "root";
            $this->password     = "";
            $this->database     = "auto_feedback";

            $this->MySQLConnect();

        }catch(Exception $e){
            echo "Your exception handling".$e;
        }
    }
    public function __destruct(){
        $this->host         = NULL;
        $this->user         = NULL;
        $this->password     = NULL;
        $this->database     = NULL;

        mysqli_close($this->connection);
    }
	public function MySQLConnect(){
        $this->connection = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if(! $this->connection){
            $e                  = 'Failed to connect to DB';
            $this->setError($e);
            echo "Your exception handling".$e;
            return false;
        }
        return $this->connection;
    }

    public function LastInsertedIdsByTable($table, $numOfColumns = 1){
        $sql                    = "SHOW KEYS FROM login WHERE Key_name = 'PRIMARY'";
        $columns                = $this->Execute($sql);
        $column_name            = $columns[0]['Column_name'];
        $sql                    = "select $column_name from $table order by $column_nmae desc limit $numOfColumns";
        $this->LastInsertedIds  = $this->Execute($sql);

        return $this->LastInsertedIds;
    }

    public function ConnectionLastInsertId(){
        $sql                    = "SELECT LAST_INSERT_ID() as id";
        $this->ConnectionLastId = $this->Execute($sql);
        $this->ConnectionLastId = $this->ConnectionLastId[0]['id'];

        return $this->ConnectionLastId;
    }

    protected function setError($error){
        array_push($this->error,$error);
    }
    public function error(){
        return $this->error[count($this->error)-1];
    }

    protected function Query($query){
        
        if($this->CheckConnection() === false){
            return false;
        }
        $execute            = mysqli_query($this->connection,$query);
        if(!$execute){
            $e              = 'MySQL query error '.mysqli_error($this->connection);
            $this->setError($e);
            echo "Your exception handling".$e;
        }
        return $execute;
    }

    protected function CheckConnection(){
        if(! $this->connection){
            $e              = 'DB connection failed';
            $this->setError($e);
            echo "Your exception handling".$e;
            return false;
        }
        return true;
    }

    public function AffectedRows(){
        return mysqli_affected_rows($this->connection);
    }

    public function Execute($query){
        if($this->CheckConnection() === false){
            return false;
        }
        $return             = array();
        print_r($query);
        $execute = $this->Query($query);
        if($execute === false){
            $e = 'MySQL query error '.mysqli_error($this->connection);
            $this->setError($e);

            echo "Your exception handling".$e;

            return false;
        }
        if(!is_bool($execute)){
            while($row = mysqli_fetch_array($execute)){
                $return[]   = $row;
            }
        }
        return $return;
    }

    public function Select($table, $condition = "", $sort = "", $order = " ASC ", $clause = " AND "){
        $query = "SELECT * FROM ".$this->noHTMLnoQuotes($this->Value($table));
        if(!empty($condition)){
            $query .= $this->where($condition,$clause);
        }
        if(!empty($sort)){
            $query .= " ORDER BY ".$sort." $order";
        }
        return $this->Execute($query);
    }

    public function Insert($table, array $rows){
        $rows       = $this->sqlWithArray($this->connection,$rows);

        $keys       = "(".implode(array_keys($rows)," ,").")";
        $values     = " VALUES (".implode(array_values($rows),", ").")";

        $query      = "INSERT INTO $table $keys $values";

        return $this->Execute($query);
    }

    public function BulkInsert($table, array $array){
        $keys           = NULL;
        $values         = NULL;
        for ($i = 0, $len = count($array); $i < $len; $i++){
            $row        = $array[$i];

            $row = $this->sqlWithArray($this->connection,$row);
            if($keys === NULL){
                $keys   = "(".implode(array_keys($row)," ,").")";
            }
            $values .= " (".implode(array_values($row),", ")." ) ,";
        }
        $lastChar = substr($values,-1);
        
        if($lastChar === ","){
            $values     = substr_replace($values,";",-1);
        } 

        $values         = " VALUES ".$values;

        $query          = "INSERT INTO $table $keys $values";

        return $this->Execute($query);
    }

    public function Update($table, $values, $condition = "", $clause = " OR "){
        $update_pairs   = array();
        foreach($values as $field=>$val){
            array_push($update_pairs,"$field = ".$this->sql($this->connection,$val));
        }
        $query = "UPDATE $table SET ";
        $query .= implode(", ",$update_pairs);
        if(!empty($condition)){
            $query .= $this->where($condition,$clause);
        }

        return $this->Execute($query);
    }

    protected function where($condition,$clause){
        $query          = " WHERE ";
        if(is_array($condition)){
            $pair       = array();
            $size       = count($condition);
            if($size > 1){
                for ($i = 0; $i < $size; $i++){
                    $each = $condition[$i];
                    foreach($each as $field=>$val){
                        array_push($pair,"$field=".$this->sql($this->connection,$val));
                    }
                    if($size-1 === $i){
                        $query .= implode(" $clause ",$pair);
                    }
                }
            }else{
                foreach($condition as $field=>$val){
                    array_push($pair,"$field=".$this->sql($this->connection,$val));
                    $query .= implode(" $clause ",$pair);
                }
            }
        }else if(is_string($condition)){
            $query .= $condition;
        }else{
            $query = "";
        }
        return $query;
    }
    public function isValid($result){
        if(is_array($result) && count($result) > 0){
            return true;
        }
        return false;
    }

    // Declare static variables
    public $TBL_EXAMPLE     = "yourtablename";

    
    public $CLAUSE_AND      = " AND "; 
    public $CLAUSE_OR       = " OR ";


	public function insert_query(){
        $execute      = $this->Insert($this->TBL_EXAMPLE,array("field1"=>$value1,"field2"=>$value2));
        $executeBulk  = $this->BulkInsert($this->TBL_EXAMPLE,array(array("field"=>$value),array("field"=>$someOtherValue)));
    }
    
    public function update_query(){
        $update       = $this->Update($this->TBL_EXAMPLE,array("fieldtochange"=>$value),array("condition"=>$conValue),$this->$CLAUSE_AND);
    }
  
    public function select_query($table_name,$where){
        $select       = $this->Select($table_name,array("WHERE SOME FIELD"=>$where),"SORT FIELD NAME","SORT ORDER",$this->CLAUSE_OR);
        echo json_encode($select);
    }

	/*function execute($sql)
	{
		$this->result=$this->conn->query($sql);
		while($row = $this->result->fetch_assoc()) {
		  $this->content=$row;
		  print_r($row);
		}
	}
	function fetchAll()
	{
	  while($row = $this->result->fetch_assoc()) {
	  	$this->content=$row;
	  	print_r($row);
	  }
	}	
	function login($data)
	{
		$sql="SELECT * FROM 'login' WHERE email_id=".$data[id];
		$result=$this->conn->query($sql);
		//$this->fetchAll();
		//return $this->content;
	}*/
	/*function getAllrecords()
	{
		$sql="SELECT * FROM 'login'";
		//$this->execute($sql);
		$result=$this->Execute($sql);
		
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		  }
		 //$this->fetchAll();
		//return $this->content;
	}*/
	
}