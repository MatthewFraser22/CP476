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
        <h2>This page has 2 sections. Course List and SQL Inejction.</h2>
        <h2>Section 1: Course List</h2>
        <p>This shows the list of courses. Click on a course to see the students enrolled in the class. The final output (following Appendix B) can be seen in the marks page.</p>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>Number </th>
                    <th>Course Name</th>
                </tr>

                <?php
                $db = new database();
                $rows = $db->query('SELECT * from courses')->fetchAll();
                $count = count($rows);
                // echo $count;
                // print_r($rows);

                $i = 1;
                foreach ($rows as $row) {
                    echo "<tr onclick='redirect(`{$row['student_id']}`, `{$row['course_code']}`)' ><td>{$i}</td><td>{$row["course_code"]}</td></tr>";
                    $i++;
                }
                ?>
            </table>
        </div>
        <h2>Section 2: Demonstration of SQL Injection</h2>
        <p>This shows how SQL injection works with SELECT * FROM students WHERE name='Xiao Qiang' OR 1=1. 1=1 means truthy condition so it will return all data in the table and ignore any condition after 1=1.</p>
        <p>In the input box, either a SQL attack such as the attack provided below or a normal query such as SELECT * FROM TABLE.
        <p>
        <div>
            <form method="get">
                <label for="sqlAttack">SQL Attack / Query: </label>

                <input class="sqlAttack" name="sqlAttack" placeholder="Enter a SQL attack or query" value="SELECT * FROM students WHERE name='Xiao Qiang' OR 1=1" />
                <button class="blueButton" type="submit" value="Submit">Submit </button>
            </form>
        </div>
        <table>
            <tr>
                <th>Number</th>
                <th>Name</th>
            </tr>
            <?php
            if (isset($_GET["sqlAttack"])) {
                $injectVal = $_GET['sqlAttack'];
                $db = new database();
                $rows = $db->query($injectVal)->fetchAll();
                $i = 0;
                foreach ($rows as $row) {
                    echo "<tr  ><td>{$i}</td><td>{$row["name"]}</td></tr>";
                    $i++;
                }
            }
            ?>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>