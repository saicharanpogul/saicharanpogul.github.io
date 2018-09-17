<?php
/**
 * Created by PhpStorm.
 * User: Saicharan Pogul
 * Date: 15-Sep-18
 * Time: 11:54 AM
 */
$hostname="us-cdbr-iron-east-01.cleardb.net";
$username="b9590ee86b2d60";
$password="4c2c99af";
$database="heroku_63a3df67f940f3c";

$connection = new mysqli($hostname,$username,$password,$database);
if($connection->connect_error) {
    $error = $connection->connect_error;
}
