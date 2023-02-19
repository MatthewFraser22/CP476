<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="index.js"></script>


<?php
$servername = "127.0.0.1";
$username = "root";
$password = "YOUR_PASS";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sys", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<html>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h2>Course List</h2>
        <p>This shows the list of courses. Click on a course to see the students enrolled in the class. The final output (following Appendix B) can be seen in the marks page.</p>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>Course Code </th>
                    <th>Course Name</th>
                </tr>
                <tr onclick="redirect()">
                    <td>CP476</td>
                    <td>Internet Computing</td>
                </tr>
                <tr onclick=" redirect()">
                    <td>CP312</td>
                    <td>Algorithims</td>
                </tr>

            </table>
        </div>
    </div>

</body>

</html>