
<?php
class database
{

    public $conn;
    function __construct()
    {

        $servername = "127.0.0.1";
        $username = "root";
        $password = "W";
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=sys", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function query($sql, $data = NULL)
    {
        $query = $this->conn->prepare($sql);
        $query->execute($data);
        return $query;
    }
}
