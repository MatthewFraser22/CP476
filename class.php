<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="class.js"></script>
<?php include 'database.php'; ?>
<html>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h2>Class List For X Course</h2>
        <p>This shows the list of students enrolled in the class. Click on the student to find out their marks on this course.</p>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Student Id</th>
                    <th>Grades</th>

                </tr>
                <tr onclick="redirect()">
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>12221</td>
                    <td>50</td>

                </tr>
                <tr onclick="redirect()">
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>12221</td>
                    <td>50</td>

                </tr>
                <tr onclick="redirect()">
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>12221</td>
                    <td>50</td>

                </tr>
                <?php
                $db = new database();
                $rows = $db->query('SELECT value FROM sys_config')->fetchAll();
                $count = count($rows);
                // echo $count;
                // print_r($rows);
                foreach ($rows as $row) {
                    echo "
                    <tr>
                    <td onclick='redirect()'>{$row["value"]}</td>
                    <td>Bla bla</td>
                    <td>Aa</td>
                    <td>bb</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>