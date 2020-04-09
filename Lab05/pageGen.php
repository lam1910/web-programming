<?php

$title = $_POST['title'];
$content = "Blank page";
if (isset($_POST['content']) && !empty($_POST['content'])) {
    $content = $_POST['content'];
}
$copyright = $_POST['copyright'];
$year = $_POST['year'];

include 'Page.php';
$page = new Page($title, $year, $copyright);
$page->addContent($content);
echo $page->get();
