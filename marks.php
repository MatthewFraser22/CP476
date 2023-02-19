<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="marks.js"></script>
<?php include 'database.php'; ?>

<html>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h2>Marks</h2>
        <p>This shows the marks for the student. Click on the edit button to change their marks. All marks have decimal number with one digital after the dot.</p>
        <div style="overflow-x:auto;">

            <table>
                <tr>
                    <th>Grade item</th>
                    <th>Grade</th>
                    <th class="editCol">Edit</th>


                </tr>
                <tr>
                    <td>Test 1</td>
                    <td>50</td>
                    <td><button class="edit blueButton" type="button" onclick="showDiv(0)">Edit</button>
                        <form method="post" class="editForm" style="visibility: hidden; display:inline;">
                            <label for="grade">New Grade: </label>

                            <input onchange="setTwoNumberDecimal" step="0.01" min="0" max="100" type="number" name="grade" placeholder="eg; 50.0" />
                            <button class="blueButton" type="submit" value="Submit">Submit </button>
                        </form>
                        <?php
                        if (isset($_POST["grade"])) {
                            $data = [
                                'name' => $_POST['grade'],
                            ];
                            $db = new database();
                            $rows = $db->query('UPDATE Persons SET FirstName=:name', $data)->fetchAll();
                            echo '<script>
                            // alert("Grade has been updated!");
                            window.location.href="./marks.php";
                            </script>';
                            // echo $count;
                            // print_r($rows);
                        }
                        ?>



                    </td>

                </tr>
                <tr>
                    <td>Test 2</td>
                    <td>50</td>
                    <td><button class="blueButton" type="button" onclick="alert('Hello world!')">Edit</button></td>

                </tr>
                <tr>
                    <td>Test 3</td>
                    <td>50</td>
                    <td><button class="blueButton" type="button" onclick="alert('Hello world!')">Edit</button></td>

                </tr>
                <?php
                $db = new database();
                $rows = $db->query('SELECT FirstName FROM Persons')->fetchAll();
                $count = count($rows);
                // echo $count;
                // print_r($rows);
                foreach ($rows as $row) {
                    echo "
                    <tr>
                    <td onclick='redirect()'>{$row["FirstName"]}</td>
                    <td>Bla bla</td>
                    <td><button class='blueButton' type='button' onclick='alert('Hello world!')'>Edit</button></td>
                    </tr>";
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
                <tr>
                    <td>1111</td>
                    <td>Matthew Francis</td>
                    <td>CP414</td>
                    <td>50.3</td>

                </tr>
                <tr>
                    <td>1111</td>
                    <td>Matthew Francis</td>
                    <td>CP414</td>
                    <td>50.4</td>

                </tr>
                <tr>
                    <td>1111</td>
                    <td>Matthew Francis</td>
                    <td>CP414</td>
                    <td>50.5</td>

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