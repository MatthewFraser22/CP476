<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="index.js"></script>
<?php include 'database.php'; ?>


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
                <?php
                $db = new database();
                $rows = $db->query('SELECT value FROM sys_config')->fetchAll();
                $count = count($rows);
                // echo $count;
                // print_r($rows);
                foreach ($rows as $row) {
                    echo "<tr><td onclick='redirect()'>{$row["value"]}</td><td>Bla bla</td></tr>";
                }
                ?>
            </table>
        </div>
        <h2>Demonstration of SQL injection</h2>
        <p>This shows how SQL injection works with SELECT * FROM Persons WHERE FirstName = 'Matthew' OR 1=1. 1=1 means truthy condition so it will return all data in the table and ignore any condition after 1=1.</p>
        <div>
            <form method="get">
                <label for="sqlAttack">SQL Attack: </label>

                <input class="sqlAttack" name="sqlAttack" placeholder="Enter a SQL attack" value="SELECT * FROM Persons WHERE FirstName='Matthew' OR 1=1" />
                <button type="submit" value="Submit">Submit </button>
            </form>
        </div>
        <?php
        if (isset($_GET["sqlAttack"])) {
            $injectVal = $_GET['sqlAttack'];
            $db = new database();
            $rows = $db->query($injectVal)->fetchAll();
            $count = count($rows);
            echo "count is {$count}";
            foreach ($rows as $row) {
                echo "
                             <tr>
                             <td onclick='redirect()'>{$row[0]}!!</td>
                             <td> oreo </td>
                             </tr>";
            }
        }
        ?>

    </div>

</body>

</html>