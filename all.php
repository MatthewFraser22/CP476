<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="all.js"></script>
<?php include "database.php"; ?>

<html>

<body>
    <?php include "header.php"; ?>
    <div class="container">
        <h2>Final grade output (Following Appendix B)</h2>

        <div style="overflow-x:auto;">
            <table>

                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course Code</th>
                    <th>Test 1</th>
                    <th>Test 2</th>
                    <th>Test 3</th>
                    <th>Exam</th>
                    <th>Final grade(test 1,2,3-3x20%, final exam 40%)</th>
                </tr>

                <?php
                $db = new database();
                $rows = $db
                    ->query(
                        'SELECT * FROM courses  INNER JOIN students
            ON courses.student_id = students.student_id'
                    )
                    ->fetchAll();
                $i = 0;
                foreach ($rows as $row) {
                    echo "
                    <tr>
                    <td onclick='redirect()'>{$row["student_id"]}</td>
                    <td onclick='redirect()'>{$row["name"]}</td>
                    <td onclick='redirect()'>{$row["course_code"]}</td>
                    <td id='{$i}test_1' data-myValue='{$row["test_1"]}' onclick='redirect()'>{$row["test_1"]}</td>
                    <td id='{$i}test_2' data-myValue='{$row["test_2"]}' onclick='redirect()'>{$row["test_2"]}</td>
                    <td id='{$i}test_3' data-myValue='{$row["test_3"]}' onclick='redirect()'>{$row["test_3"]}</td>
                    <td id='{$i}exam' data-myValue='{$row["exam"]}'  onclick='redirect()'>{$row["exam"]}</td>
                    <td onclick='redirect()' id='{$i}outputDiv'></td>
                    </tr>";
                    $i = $i + 1;
                }
                ?>

                <script>
                    calculator(50)
                </script>

            </table>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>

<!-- <td id='test_2' data-myValue='{$row[`{id}test_2`]}'  onclick='redirect()'>{$row["test_2"]}</td>
                    <td id='test_3' data-myValue='{$row[`{id}test_3`]}' onclick='redirect()'>{$row["test_3"]}</td> -->