<html>
<head>
    <title>
        <?php
        $doc_title = 'Business Listings';
        echo "$doc_title\n";
        ?>
    </title>
</head>
<body>
<h1>
    <?= $doc_title ?>
</h1>
<?php
// establish the database connection
require_once('database.php');
$pick_message = 'Click on a category to find business listings:';
?>
<table border=0>
    <tr>
        <td valign="top">
            <table border=5>
                <tr>
                    <td class="picklist"><strong><?= $pick_message ?></strong></td>
                </tr>
                <p>
                    <?php
                    // build the scrolling pick list for the categories
                    $sql = "SELECT * FROM Categories";
                    $result = mysqli_query($db, $sql);
                    if (mysqli_error($db)) die($db->error);
                    while ($row = mysqli_fetch_row($result)) {
                        if (mysqli_error($db)) die($db->error);
                        echo "<tr><td class=\"formlabel\"><a href=\"6-3-business-list.php?cat_id=$row[0]\">$row[1]</a></td></tr>\n";
                    }
                    ?>
            </table>
        </td>
        <td valign="top">
            <table border=1>
                <?php
                if (isset($_GET['cat_id'])) {
                    $cat_id = $_GET['cat_id'];
                    if ($cat_id) {
                        $sql = "SELECT * FROM Businesses b, Biz_Categories bc where Category_ID = '$cat_id' and b.Business_ID = bc.Business_ID";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_error($db)) die($db->error);
                        $color = 1;
                        while ($row = mysqli_fetch_row($result)) {
                            if (mysqli_error($db)) die($db->error);
                            if ($color == 1) {
                                $bg_shade = 'dark';
                                $color = 0;
                            } else {
                                $bg_shade = 'light';
                                $color = 1;
                            }
                            echo "<tr>\n";
                            for ($i = 0; $i < count($row); $i++) {
                                echo "<td class=\"$bg_shade\">$row[$i]</td>\n";
                            }
                            echo "</tr>\n";
                        }
                    }
                }
                ?>
            </table>
        </td>
    </tr>
</table>
</body>
</html>