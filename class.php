<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="class.js"></script>
<?php include 'database.php'; ?>
<html>

<body>
    <?php include 'header.php'; ?>
    <div class="container">

        <span class="backIcon" onclick="window.history.go(-1)">&#8592;</span>


        <h2>Class List For X Course</h2>
        <p>This shows the list of students enrolled in the class. Click on the student to find out their marks on this course.</p>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Last Name</th>
                </tr>

                <?php
                $db = new database();
                $rows = $db->query('SELECT * FROM students WHERE student_id = :id', [":id" => $_GET['id']])->fetchAll();

                $count = count($rows);
                // echo $count;
                // print_r($rows);
                echo  $_GET['id'];
                foreach ($rows as $row) {
                    echo "
                    <tr>
                    <td onclick='redirect()'>{$row["student_id"]}</td>
                    <td onclick='redirect()'>{$row["name"]}</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>