<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="marks.js"></script>

<html>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h2>Marks</h2>
        <p>This shows the marks for the student. Click on the edit button to change their marks.</p>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>Grade item</th>
                    <th>Grade</th>
                    <th>Edit</th>


                </tr>
                <tr>
                    <td>Test 1</td>
                    <td>50</td>
                    <td><button id="edit" type="button" onclick="showDiv()">Edit</button>
                        <form action="/action_page.php" id="welcomeDiv" style="visibility: hidden; display:inline;">
                            <label for="fname">New Grade: </label>

                            <input name="fname" class="answer_list" placeholder="eg; 50" />
                            <input type="submit" value="Submit">
                        </form>

                        <input id="welcomeDiv" style="display:none;" class="answer_list" />

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
</body>

</html>