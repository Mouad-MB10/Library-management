<?php
session_start();
require 'connection.php';
$requete="SELECT dbooks.id_db \"id_db\",  users.name \"name\",books.images \"images\", books.book_name \"book_name\" FROM ((dbooks INNER JOIN users ON 
dbooks.user_id = users.user_id) INNER JOIN books ON dbooks.book_id = books.book_id);";

$result=$pdo->query($requete);

$data=$result->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
           <a href="userdashbord.php" class="navbar-brand">User Dashbord</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle"  data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['name']; ?> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                   <li><a href="view.php">View Profile</a></li>
                   <li><a href="edit.php">Edite Profile</a></li>
                   <li><a href="editpassword.php">Change Password</a></li>
                 </ul>
          </li>
          <li class="nav-item "><a href="logout.php" class="nav-link">LogOut</a></li>
        </ul>
    </div>
 
</nav>
<br><br><br><br>
<div class="col-md-2"></div>
<div class="col-md-8">
    <table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>Name_User</th>
              <th>book_name</th>
              <th>Images</th>
          </tr>
          
        <?php
$name="";
$img="";
$bookname="";
foreach ($data as $row) {
    $name=$row['name'];
    $img=$row['images'];
    $bookname=$row['book_name'];

         ?>
             <tr>
             <td><?php echo  $name ; ?></td>
             <td><?php echo  $bookname ;?></td>
             
             <td><img src="admin/images/<?php echo  $img ;?>" alt="" width="60px" height="60px"></td>
            </tr>
         <?php }
     ?>
      </thead>
    </table>
</div>
<div class="col-md-2"></div>
</div>
</body>
</html>