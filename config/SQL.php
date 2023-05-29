<?php 
class SQL
{
    protected $servername, $username, $password, $conn;

    public function __construct(String $dbName=NULL)
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "toor";

        if($dbName){
            try {
                $this->conn = new PDO("mysql:host=$this->servername;dbname=$dbName", $this->username);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            catch(PDOException $e)
                {
                echo "Connection failed: " . $e->getMessage();
                }
        }
    }

    public function getDataBase()
    {    
        return $this->conn;
    }

    public function getTableData($tableName) {
        $sql = "SELECT * FROM $tableName";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createTableData($tableName, $data) {
        $sql = "INSERT INTO $tableName (firstName, lastName, registrationNo, mailID) VALUES (:firstName, :lastName, :registrationNo, :mailID)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}
?>