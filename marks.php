<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="marks.js"></script>
<?php include 'database.php'; ?>

<html>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <span class="backIcon" onclick="window.history.go(-1)">&#8592;</span>


        <h2>Marks</h2>
        <p>This shows the marks for the student. Click on the edit button to change their marks. All marks have decimal number with one digital after the dot.</p>
        <div style="overflow-x:auto;">

            <table>
                <tr>
                    <th>Grade item</th>
                    <th>Grade</th>
                    <th class="editCol">Edit</th>


                </tr>
                <?php
                $db = new database();
                $rows = $db->query('SELECT DISTINCT test_1,test_2,test_3, exam  FROM courses 
 WHERE courses.student_id = :id AND course_code = :course', [":id" => $_GET['id'], ":course" => $_GET['course']])->fetchAll();
                $count = count($rows);
                echo $count;
                // print_r($rows);
                // echo  $_GET['id'];
                foreach ($rows as $row) {
                    for ($x = 1; $x < 4; $x++) {
                        $test = 'Test ' . $x;
                        echo "
                        <tr>
                        <td>{$test}</td>
                        <td>{$row["test_{$x}"]}</td>
                        <td><button class='edit blueButton' type='button' onclick='showDiv(0)'>Edit</button>
                        <form method='post' class='editForm' style='visibility: hidden; display:inline;'>
                            <label for='grade'>New Grade: </label>
    
                            <input onchange='setTwoNumberDecimal' step='0.01' min='0' max='100' type='number' name='grade' placeholder='eg; 50.0' />
                            <button class='blueButton' type='submit' value='Submit'>Submit </button>
                        </form>
                    </td>
                        </tr>";
                    }
                    echo "
                    <tr>
                    <td >Exam</td>
                    <td >{$row["exam"]}</td>
                    <td><button class='edit blueButton' type='button' onclick='showDiv(0)'>Edit</button>
                    <form method='post' class='editForm' style='visibility: hidden; display:inline;'>
                        <label for='grade'>New Grade: </label>

                        <input onchange='setTwoNumberDecimal' step='0.01' min='0' max='100' type='number' name='grade' placeholder='eg; 50.0' />
                        <button class='blueButton' type='submit' value='Submit'>Submit </button>
                    </form>
                </td>
                    </tr>";
                }
                if (isset($_POST["grade"])) {
                    $data = [
                        'grade' => $_POST['grade'],
                    ];
                    $db = new database();
                    $rows = $db->query('UPDATE courses SET test_1=:grade', $data)->fetchAll();
                    echo '<script>
                    // alert("Grade has been updated!");
                    window.location.href="./marks.php";
                    </script>';
                    // echo $count;
                    // print_r($rows);
                }

                ?>



            </table>
        </div>

    </div>
    <div class="container">
        <h2>Final grade output (Following Appendix B)</h2>

        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course Code</th>
                    <th>Final grade(test 1,2,3-3x20%, final exam 40%)</th>



                </tr>

                <?php
                $db = new database();
                $rows = $db->query('SELECT *  FROM courses  INNER JOIN students
            ON courses.student_id = students.student_id WHERE courses.student_id = :id AND course_code = :course', [":id" => $_GET['id'], ":course" => $_GET['course']])->fetchAll();
                // echo $count;
                // print_r($rows);
                foreach ($rows as $row) {
                    echo "
                    <tr>
                    <td onclick='redirect()'>{$row["student_id"]}</td>
                    <td onclick='redirect()'>{$row["name"]}</td>
                    <td onclick='redirect()'>{$row["course_code"]}</td>
                    <td onclick='redirect()'>{$row["exam"]}</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>