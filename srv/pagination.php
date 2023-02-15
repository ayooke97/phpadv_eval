<?php
include_once('./config.php');
$total_post_per_page = 6;
$query = "SELECT * FROM post";

echo date("D-M-Y");
$timestamp = time();
setlocale(LC_TIME, 'id_ID');
$formattedDate = strftime("%A, %d %B %Y", $timestamp);
echo $formattedDate;
