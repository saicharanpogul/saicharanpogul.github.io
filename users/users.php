<?php
try{
    require 'connection.php';
}catch(Exception $e){
    $error = $e->getMessage();
}
?>







<html>
<head>
    <title>Users</title>
</head>
<link rel="stylesheet" type="text/css" href="../stylesheet/users.css">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/united/bootstrap.min.css">

<ul class="nav nav-tabs container" style="padding: 20px">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="../index.html">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="users.php">Users</a>
    </li>
</ul>


<body>
<div class="container" align="center" style="padding: 20px; top: 10px" >
<?php $result = $connection->query("SELECT UserName FROM users");?>
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">
        USERS
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user1/user1.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user2/user2.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user3/user3.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user4/user4.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user5/user5.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user6/user6.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user7/user7.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user8/user8.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user9/user9.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user10/user10.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled"><?php
        $row = mysqli_fetch_array($result);
        echo '<a href="user1/user1.php">';
        print $row[0];
        echo '</a>';
       
        ?>
    </a>
    
</div>
    </div>

</body>
</html>




