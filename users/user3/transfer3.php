<?php
/**
 * Created by PhpStorm.
 * User: Saicharan Pogul
 * Date: 16-Sep-18
 * Time: 6:09 PM
 */
try{
    require '../connection.php';
}catch(Exception $e){
    $error = $e->getMessage();
}
$title = "SELECT UserName FROM users";

if($row = mysqli_query($connection,$title)) {

    mysqli_data_seek($row, 2);

    $row = mysqli_fetch_row($row);
}
?>



<html>
<head>
    <title> Users List</title>
</head>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">


<body>





<ul class="nav nav-tabs container" style="padding: 20px">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="../../index.html">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="../users.php">Users</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="../user3/user3.php"><?php printf("%s ", $row[0]); ?></a>
    </li>
</ul>



<form class="container card border-info mb-3" style="padding-top: 10px; padding-bottom: 10px; top: 100px">
    <fieldset>
        <legend>Transfer</legend>
        <div class="form-group">
            <label for="userid">User ID</label>
            <input type="number" class="form-control" id="userid" placeholder="Enter UserID">
            <small id="userid" class="form-text text-muted">Enter valid User ID.</small>
        </div>
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" class="form-control" id="username" placeholder="Enter UserName">
            <small id="username" class="form-text text-muted">Enter valid User Name.</small>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="amount" class="form-control" id="amount" placeholder="Amount">
        </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>









</body>

</html>

