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

    mysqli_data_seek($row, 0);

    $row = mysqli_fetch_row($row);
}
?>

<html>
<head>
    <title>Credit Transfer</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
<body>

<ul class="nav nav-tabs container" style="padding: 20px">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="../../index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="../users.php">Users</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="../user1/user1.php"><?php printf("%s ", $row[0]); ?></a>
    </li>
</ul>

<?php

mysqli_autocommit($connection, FALSE);


if (isset($_POST['submit'])) {
    if ($_POST['submit'] && is_numeric($_POST['Credits'])) {


        $result = mysqli_query($connection, "UPDATE users SET Credits = Credits + " . $_POST['Credits'] . " WHERE UserName = " . $_POST['to']);
        if ($result !== TRUE) {
            mysqli_rollback($connection);
        }


        $result = mysqli_query($connection, "UPDATE users SET Credits = Credits - " . $_POST['Credits'] . " WHERE UserName = " . $_POST['from']);
        if ($result !== TRUE) {
            mysqli_rollback($connection);
        }


        mysqli_commit($connection);


    }
}

$result = mysqli_query($connection, "SELECT * FROM users");
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;

}

mysqli_close($connection);
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="container card border-info mb-3" style="padding-top: 10px; padding-bottom: 10px; top: 5px">
    Transfer <input type="text" name="Credits" size="5" class="form-control" placeholder="Enter credits"> from

    <select name="from" class="container form-control">
        <?php
        foreach ($users as $u) {
            echo "<option value=\"" . $u['UserName'] . "\">" . $u['UserName'] . "</option>";
        }
        ?>
    </select>

    to

    <select name="to" class="container form-control">
        <?php
        foreach ($users as $u) {
            echo "<option value=\"" . $u['UserName'] . "\">" . $u['UserName'] . "</option>";
        }
        ?>
    </select><br>

    <center><input type="submit" name="submit" value="Transfer" class="btn btn-primary close" ></center>

</form>
<center><div class="container">
        <h3>ACCOUNT CreditsS</h3>
        <table border=1 class="table table-hover">
            <?php
            foreach ($users as $u) {
                echo "<tr><td>" . $u['UserId'] . "</td><td>" .$u['UserName']. "</td><td>" . $u['Credits'] . "</td></tr>";
            }
            ?>
        </table>

    </div></center>


</body>

</html>

