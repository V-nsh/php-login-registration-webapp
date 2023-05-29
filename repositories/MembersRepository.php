<?php 
require_once(ROOT . '/config/SQL.php');

class MembersRepository
{
    protected $conn;
    public function __construct()
    {
        $this->conn = new SQL('IEEE');
    }

    public function getDatabase()
    {
        return $this->conn->getDataBase();
    }

    public function getMembersData()
    {
        return $this->conn->getTableData('members');
    }

    public function createMembersData($data)
    {
        $this->conn->createTableData('members', $data);
    }

}
?>