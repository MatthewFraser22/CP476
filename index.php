<link rel="stylesheet" href="css/table.css" type="text/css">
<script src="index.js"></script>

<html>

<body>
    <?php include 'header.php'; ?>
    <h2>Course List</h2>
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

        </table>
    </div>

</body>

</html>