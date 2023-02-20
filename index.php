<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="index.js"></script>
<?php include 'database.php'; ?>


<html>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Easily marks students in different courses with EasyMarking </h1>
        <h4>Millions of markers and agencies around the world use EasyMarking - be apart of our community. </h4>
        <img class="homepagePic" src="easymarkinghome.jpg" />
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
        <p>In the input box, either a SQL attack such as the attack provided below or a normal query such as SELECT * FROM TABLE.
        <p>
        <div>
            <form method="get">
                <label for="sqlAttack">SQL Attack / Query: </label>

                <input class="sqlAttack" name="sqlAttack" placeholder="Enter a SQL attack or query" value="SELECT * FROM Persons WHERE FirstName='Matthew' OR 1=1" />
                <button class="blueButton" type="submit" value="Submit">Submit </button>
            </form>
        </div>
        <table>
            <tr>
                <th>FirstName</th>
                <th>Course Name</th>
            </tr>
            <?php
            if (isset($_GET["sqlAttack"])) {
                $injectVal = $_GET['sqlAttack'];
                $db = new database();
                $rows = $db->query($injectVal)->fetchAll();
                foreach ($rows as $row) {
                    echo "
                             <tr>
                             <td onclick='redirect()'>{$row['LastName']}</td>
                             <td> oreo </td>
                             </tr>";
                }
            }
            ?>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>