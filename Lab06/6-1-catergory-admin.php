<html>
<head>
    <?php
    require_once('database.php');
    ?>
    <title>
        <?php
        // print the window title and the topmost body heading
        $doc_title = 'Category Administration';
        echo "$doc_title\n";
        ?>
    </title>
</head>
<body>
<h1>
    <?php
    echo "$doc_title\n";
    ?>
</h1>
<?php
// add category record input section
// extract values from $_POST
if (isset($_POST['submit'])) {
    $Cat_ID = $_POST['Cat_ID'];
    $Cat_Title = $_POST['Cat_Title'];
    $Cat_Desc = $_POST['Cat_Desc'];
    $add_record = $_POST['add_record'];
// determine the length of each input field
    $len_cat_id = strlen($_POST['Cat_ID']);
    $len_cat_tl = strlen($_POST['Cat_Title']);
    $len_cat_de = strlen($_POST['Cat_Desc']);

// validate and insert if the form script has been
// called by the Add Category button
    if ($add_record == 1) {
        if (($len_cat_tl > 0) and ($len_cat_de > 0)) {
//            $sql = "insert into Categories (Category_ID, Title, Description) values ('$Cat_ID', '$Cat_Title', '$Cat_Desc')";
//            $result = mysqli_query($db, $sql);
            $sql = "insert into Categories (Category_ID, Title, Description) values (?,?,?)";;
            $query = $db->prepare($sql);
            $query->bind_param("sss", $Cat_ID, $Cat_Title, $Cat_Desc);
            $query->execute();
            mysqli_commit($db);
        } else {
            echo "<p>Please make sure all fields are filled in and try again.</p>\n";
        }
    }
}
// list categories reporting section
// query all records in the table after any
// insertion that may have occurred above
$sql = "select * from Categories";
$result = mysqli_query($db, $sql);

?>
<form method="post" action="#">
    <table>
        <tr>
            <th style="background-color: #eeeeee">Cat ID</th>
            <th style="background-color: #eeeeee">Title</th>
            <th style="background-color: #eeeeee">Description</th>
        </tr>
        <?php
        // display any records fetched from the database
        // plus an input line for a new category
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach ($row as $field) {
                echo "<td>$field</td>";
            }
            echo "</tr>\n";
        }
        ?>
        <tr>
            <td><input type="text" name="Cat_ID" size="15" maxlength="10"/></td>
            <td><input type="text" name="Cat_Title" size="40" maxlength="128"/></td>
            <td><input type="text" name="Cat_Desc" size="45" maxlength="255"/></td>
        </tr>
    </table>
    <input type="hidden" name="add_record" value="1"/>
    <input type="submit" name="submit" value="Add Category"/>
</body>
</html>