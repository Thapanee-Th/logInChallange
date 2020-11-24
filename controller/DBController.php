<?php
class DBController {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "login";
    private $conn;

    function __construct() {
        $this->conn = $this->connectDB();
    }   
    function escapeString($var){
       return $this->conn->real_escape_string($var);
   }
   function connectDB() {
    $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

function runBaseQuery($query) {
    $result = $this->conn->query($query);   
     $resultset = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $resultset[] = $row;
        }
    }
    return $resultset;
}

function multiStatements($query) {
   if (!$this->conn->multi_query($query)) {
    echo "Multi query failed: (" . $this->conn->errno . ") " . $this->conn->error;
}

do {
    if ($res = $this->conn->store_result()) {
        var_dump($res->fetch_all(MYSQLI_ASSOC));
        $res->free();
    }
} 
while ($this->conn->more_results() && $this->conn->next_result());
}



function runQuery($query, $param_type, $param_value_array) {
    $sql = $this->conn->prepare($query);
    $this->bindQueryParams($sql, $param_type, $param_value_array);
    $sql->execute();
    $result = $sql->get_result();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $resultset[] = $row;
        }
    }
    
    if(!empty($resultset)) {
        return $resultset;
    }
}

function bindQueryParams($sql, $param_type, $param_value_array) {
    $param_value_reference[] = & $param_type;
    for($i=0; $i<count($param_value_array); $i++) {
        $param_value_reference[] = & $param_value_array[$i];
    }
    call_user_func_array(array(
        $sql,
        'bind_param'
    ), $param_value_reference);
}

function insert($query, $param_type, $param_value_array) {
    $sql = $this->conn->prepare($query);
    $this->bindQueryParams($sql, $param_type, $param_value_array);
    $sql->execute();
    $insertId = $sql->insert_id;
    return $insertId;
}

function update($query, $param_type, $param_value_array) {
    $sql = $this->conn->prepare($query);
    $this->bindQueryParams($sql, $param_type, $param_value_array);
    $sql->execute();
    $effectedRow = $sql->affected_rows;
    return $effectedRow;
}
}
?>