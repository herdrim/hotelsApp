<?php
class DatabaseConnection
{
    public $HostName;
	public $UserName;
	public $Password;
	public $DbName;
	public $Connection;
    
    public function __construct($hostName, $userName, $password, $dbName)
    {
        $this->HostName = $hostName;
		$this->UserName = $userName;
		$this->Password = $password;
		$this->DbName = $dbName;  
        $this->Connection = new PDO('mysql:host=localhost;dbname=hotele', 'root', '');
    }
    
    public function SelectAll($tableName)
    {
        $sql = "select * from $tableName";
        return $this->Connection->query($sql);
    }
    
    public function SelectColumn($tableName, $columnName)
    {
        $sql = "select $columnName from $tableName";
        return $this->Connection->query($sql);        
    }
}

$connection = new DatabaseConnection('localhost', 'root', '', 'hotele');

?>