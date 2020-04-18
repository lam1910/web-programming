<html>
<head>
    <title>
        <?php
        $doc_title = 'Business Registration';
        echo "$doc_title\n";
        ?>
    </title>
</head>
<body>
<h1>
    <?= $doc_title ?>
</h1>
<?php
require_once('database.php');
$add_record = 0;
$Biz_Name = "";
$Biz_Address = "";
$Biz_City = "";
$Biz_Telephone = "";
$Biz_URL = "";
$Biz_Categories = [];

$pick_message = 'Click on one, or control-click on<br>multiple categories:';

// fetch query parameters
if (isset($_POST['submit'])) {
    $add_record = $_POST['add_record'];
    $Biz_Name = $_POST['Biz_Name'];
    $Biz_Address = $_POST['Biz_Address'];
    $Biz_City = $_POST['Biz_City'];
    $Biz_Telephone = $_POST['Biz_Telephone'];
    $Biz_URL = $_POST['Biz_URL'];
    $Biz_Categories = $_POST['Biz_Categories'];

// add new business
    if ($add_record == 1) {
        $pick_message = 'Selected category values<br/>are highlighted:';
//        $sql = "INSERT INTO Businesses (Name, Address, City, Telephone, URL) VALUES ('$Biz_Name', '$Biz_Address', '$Biz_City', '$Biz_Telephone', '$Biz_URL')";
        $sql = "INSERT INTO Businesses (Name, Address, City, Telephone, URL) VALUES (?,?,?,?,?)";
        $query = $db->prepare($sql);
        $query->bind_param("sssss", $Biz_Name, $Biz_Address, $Biz_City, $Biz_Telephone, $Biz_URL);
        $query->execute();
//        $resp = mysqli_query($db, $sql);
//        if (mysqli_error($db)) die($db->error);
        $resp = mysqli_commit($db);
        if (mysqli_error($db)) die($db->error);

    }
}
echo '<p class="message">Record inserted as shown below.</p>';
$biz_id = mysqli_query($db, 'SELECT max(Business_ID) FROM Businesses');
$biz_id = mysqli_fetch_row($biz_id);
?>
<form method="post" action="#">
    <table border="1px solid black">
        <tr>
            <td class="picklist" style="padding: 15px"><?= $pick_message ?>
                <p>
                    <select name="Biz_Categories[]" size="4" style="width: 100px" multiple>
                        <?php
                        // build the scrolling pick list for the categories
                        $sql = "SELECT * FROM Categories";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_error($db)) die($db->error);
                        while ($row = mysqli_fetch_row($result)) {
                            if (mysqli_error($db)) die($db->error);
                            if ($add_record == 1) {
                                $selected = false;
// if this category was selected, add a new biz_categories row
                                if (in_array($row[1], $Biz_Categories)) {
//                                    $sql = "INSERT INTO Biz_Categories (Business_ID, Category_ID) VALUES ($biz_id[0], '$row[0]')";
                                    $sql = "INSERT INTO Biz_Categories (Business_ID, Category_ID) VALUES (?,?)";
                                    $query = $db->prepare($sql);
                                    $query->bind_param("ds", $biz_id[0], $row[0]);
                                    $query->execute();
//                                    $resp = mysqli_query($db, $sql);
//                                    if (mysqli_error($db)) die($db->error);
                                    $resp = mysqli_commit($db);
                                    if (mysqli_error($db)) die($db->error);
                                    echo "<option selected=\"selected\">$row[1]</option>\n";
                                    $selected = true;
                                }
                                if ($selected == false) {
                                    echo "<option>$row[1]</option>\n";
                                }
                            } else {
                                echo "<option>$row[1]</option>\n";
                            }
                        }
                        ?>
                    </select>
            </td>
            <td class="picklist" style="padding: 15px">
                <table>
                    <tr>
                        <td class="FormLabel">Business Name:</td>
                        <td><input type="text" name="Biz_Name" size="40" maxlength="255" value="<?= $Biz_Name ?>"/></td>
                    </tr>
                    <tr>
                        <td class="FormLabel">Address:</td>
                        <td><input type="text" name="Biz_Address" size="40" maxlength="255"
                                   value="<?= $Biz_Address ?>"/></td>
                    </tr>
                    <tr>
                        <td class="FormLabel">City:</td>
                        <td><input type="text" name="Biz_City" size="40" maxlength="128" value="<?= $Biz_City ?>"/></td>
                    </tr>
                    <tr>
                        <td class="FormLabel">Telephone:</td>
                        <td><input type="text" name="Biz_Telephone" size="40" maxlength="64"
                                   value="<?= $Biz_Telephone ?>"/></td>
                    </tr>
                    <tr>
                        <td class="FormLabel">URL:</TD>
                        <td><input type="text" name="Biz_URL" size="40" maxlength="255" value="<?= $Biz_URL ?>"/></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <p>
        <input type="hidden" name="add_record" value="1"/>
        <?php
        // display the submit button onnew forms; link to a fresh registration
        // page on confirmations
        if ($add_record == 1) {
            echo '<p><a href="6-2-business-reg.php">Add Another Business</a></p>';
        } else {
            echo '<input type="submit" name="submit" value="Add Business" />';
        }
        ?>
    </p>
</body>
</html>