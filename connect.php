<?php
include_once 'simple_html_dom.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bill-getdata-football";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = getdate();
if($date['hours'] < 19) $date['mday'] -= 1;
if($date['mon'] < 10) $date['mon'] = "0".$date['mon'];
$date = $date['year'] . "-" . $date['mon'] . "-" .$date['mday'];
    // $servername = gethostname();
    // $username = "pulltest_bill_onfa";
    // $password = "Hatemoneys1";
    // $dbname = "pulltest_bill-show-kqxs";