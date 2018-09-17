<?php
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
    <title>
        <?php printf("%s ", $row[0]); ?>
    </title>
</head>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">

<ul class="nav nav-tabs container" style="padding: 20px">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="../../index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="../users.php">Users</a>
    </li>
</ul>

<body>

<div class="card border-dark mb-3 container" style="max-width: 20rem; top: 40px" align="center">
    <div class="card-header">Credits of <?php printf("%s ", $row[0]); ?></div>
    <div class="card-body">
        <h4 class="card-title"><?php
            $users = $connection->query("SELECT UserName, Credits FROM users");

            echo '<font size=6><div class="amount">';
            mysqli_data_seek($users,2);

            $row=mysqli_fetch_row($users);

            printf("%s ",$row[1]); ?></h4>
    </div>
</div>

<?php $list = $connection->query("SELECT UserName, UserId FROM users"); ?>

<div class="card border-danger mb-3 container" style="max-width: 20rem; top: 100px" align="center">
    <div class="card-header">Transfer</div>
    <div class="card-body">


        <a class="btn btn-primary btn-lg" href="transfer3.php" role="button">Transfer Credits</a>


    </div>

</body>
</html>