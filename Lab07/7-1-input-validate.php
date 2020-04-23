<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Output</title>
</head>
<body>
<?php
$email_regex = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
$url_regex = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
$url_wo_http_regex = "/^([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
$phone_regex = "/^0[3,5,7,8,9]{1}[0-9]{8}$/";

$email = $_POST["email"];
$url = $_POST["url"];
$phone = $_POST["phone"];

if (preg_match($email_regex, $email)){
    print "Valid email = $email <br>";
}else{
    print "Invalid email=$email<br>";
}
if (preg_match($url_regex, $url)){
    print "Valid url with http = $url <br>";
}elseif (preg_match($url_wo_http_regex, $url)){
    print "Valid url without http = $url <br>";
}else{
    print "Invalid url=$url<br>";
}
if (preg_match($phone_regex, $phone)){
    print "Valid phone number = $phone <br>";
}else{
    print "Invalid phone number=$phone<br>";
}
?>
</body>
