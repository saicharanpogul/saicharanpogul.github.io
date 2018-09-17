<?php
/**
 * Created by PhpStorm.
 * User: Saicharan Pogul
 * Date: 15-Sep-18
 * Time: 11:54 AM
 */
$hostname="localhost";
$username="root";
$password="Pogul@1627";
$database="creditmanagement";

$connection = new mysqli($hostname,$username,$password,$database);
if($connection->connect_error) {
    $error = $connection->connect_error;
}
