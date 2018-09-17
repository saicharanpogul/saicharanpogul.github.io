

<?php
/**
 * Created by PhpStorm.
 * User: Saicharan Pogul
 * Date: 16-Sep-18
 * Time: 10:11 PM
 */

// connect to database
try{
    require 'connection.php';
}catch(Exception $e){
    $error = $e->getMessage();
}


// turn off auto-commit
mysqli_autocommit($connection, FALSE);

// look for a transfer
if ($_POST['submit'] && is_numeric($_POST['amt'])) {
    // add $$ to target account
    $result = mysqli_query($connection, "UPDATE users SET Credits = Credits + " . $_POST['amt'] . " WHERE UserId = " . $_POST['to']);
    if ($result !== TRUE) {
        mysqli_rollback($connection);  // if error, roll back transaction
    }

    // subtract $$ from source account
    $result = mysqli_query($connection, "UPDATE users SET Credits = Credits - " . $_POST['amt'] . " WHERE UserId = " . $_POST['from']);
    if ($result !== TRUE) {
        mysqli_rollback($connection);  // if error, roll back transaction
    }

    // assuming no errors, commit transaction
    mysqli_commit($connection);
}

// get account Creditss
// save in array, use to generate form
$result = mysqli_query($connection, "SELECT * FROM users");
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

// close connection
mysqli_close($connection);
?>
<html>
<head></head>
<body>

<h3>TRANSFER</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Transfer $ <input type="text" name="amt" size="5"> from

<select name="from">
<?php
foreach ($users as $u) {
    echo "<option value=\"" . $u['UserId'] . "\">" . $u['UserId'] . "</option>";
}
?>
</select>

to

<select name="to">
<?php
foreach ($users as $u) {
    echo "<option value=\"" . $u['UserId'] . "\">" . $u['UserId'] . "</option>";
}
?>
</select>

<input type="submit" name="submit" value="Transfer">

</form>

<h3>ACCOUNT CreditsS</h3>
<table border=1>
<?php
foreach ($users as $u) {
    echo "<tr><td>" . $u['UserId'] . "</td><td>" . $u['Credits'] . "</td></tr>";
}
?>
</table>
</body>
</html>