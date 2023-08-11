<?php

$ip = $_GET['ip'];
$ping = exec("ping -n 1 $ip", $output,$status);
echo($status);

?>