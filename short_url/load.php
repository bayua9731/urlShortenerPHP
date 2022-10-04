<?php
require_once("config.php");
$code = $_GET['code'];

$mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DB_NAME);

$check = $mysqli->query("SELECT * FROM url WHERE url_short='" . $code . "'");
$numrows = $check->num_rows;
if ($numrows == 1) {
    $row=$check->fetch_assoc();
    $url=$row["url_long"];
    header('location:'.$url);
} else {
    echo "CODE TIDAK ADA";
}
