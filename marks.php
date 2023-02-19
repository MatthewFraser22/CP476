<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="marks.js"></script>

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
                    <td><button class="edit" type="button" onclick="showDiv(0)">Edit</button>
                        <form action="/action_page.php" class="editForm" style="visibility: hidden; display:inline;">
                            <label for="grade">New Grade: </label>

                            <input name="grade" placeholder="eg; 50.0" />
                            <input type="submit" value="Submit">
                        </form>
                    </td>

                </tr>
                <tr>
                    <td>Test 2</td>
                    <td>50</td>
                    <td><button type="button" onclick="alert('Hello world!')">Edit</button></td>

                </tr>
                <tr>
                    <td>Test 3</td>
                    <td>50</td>
                    <td><button type="button" onclick="alert('Hello world!')">Edit</button></td>

                </tr>
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
            </table>
        </div>
    </div>
</body>

</html>