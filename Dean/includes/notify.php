<?php
include('dbh.inc.php');
$notify_value = $_GET['notify_value'];

$notify = mysqli_query($conn, "UPDATE applications SET notify = $notify_value") or die("Couldn't send notifications");
echo ($notify_value == 'true') ? 'Notifications sent' : 'Notifications removed';

?>