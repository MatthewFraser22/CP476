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
                    <th>Full Name</th>
                    <th>Edit Name</th>
                </tr>

                <?php
                $db = new database();
                $rows = $db->query('SELECT *  FROM courses INNER JOIN students ON students.student_id = courses.student_id
                WHERE courses.student_id = :id AND course_code = :course', [":id" => $_GET['id'], ":course" => $_GET['course']])->fetchAll();

                $count = count($rows);
                // echo $count;
                // print_r($rows);
                // echo  $_GET['id'];

                function postHelper($i)
                {
                    $data = [
                        'name' => $_POST["name{$i}"], "id" => $_GET['id']
                    ];
                    $db = new database();
                    $rows = $db->query("UPDATE students SET name=:name WHERE student_id = :id", $data)->fetchAll();
                    header("Refresh:0");
                }
                $x = 1;
                foreach ($rows as $row) {

                    echo "
                    <tr  onclick='redirect(`{$row['student_id']}`, `{$_GET['course']}`)' >{$row["student_id"]}>
                    <td  onclick='redirect(`{$row['student_id']}`, `{$_GET['course']}`)' >{$row["student_id"]}</td>
                    <td  onclick='redirect(`{$row['student_id']}`, `{$_GET['course']}`)'>{$row["name"]}</td>
                                            <td><button class='edit blueButton' type='button' onclick='showDiv($x - 1)'>Edit</button>
                        <form method='post' class='editForm' style='visibility: hidden; display:inline;'>
                            <label for='name{$x}'>New Name: </label>
    
                            <input  onkeydown='return /[a-z]/i.test(event.key)'  name='name{$x}'' placeholder='Enter characters' />
                            <button class='blueButton' type='submit' value='Submit'>Submit </button>
                        </form>
                    </tr>";
                    if (isset($_POST["name{$x}"])) {

                        postHelper($x);
                    }
                    $x++;
                }
                ?>
            </table>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>