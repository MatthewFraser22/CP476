
<?php
class database
{

    public $conn;
    function __construct()
    {

        $servername = "127.0.0.1";
        $username = "root";
        $password = "ePW";
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=sys", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            // select all users
            $stmt = $this->conn->query("SELECT value FROM sys_config");
            while ($row = $stmt->fetch()) {
                echo "<td>{$row["value"]} !! </td>";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
