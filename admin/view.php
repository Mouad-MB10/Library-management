<?php
require '../connection.php';
session_start();
$requete="SELECT * FROM admins WHERE email='".$_SESSION['email']."'";
$result=$pdo->query($requete);
$data=$result->fetchAll(PDO::FETCH_ASSOC);
$name="";
$email="";
$tel="";
foreach ($data as $row) {
    $name=$row['name'];
    $email=$row['email'];
    $tel=$row['mobile'];
}
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
           <a href="admindashbord.php" class="navbar-brand">Admin Dashbord</a>
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
          <li class="nav-item "><a href="" class="nav-link">LogOut</a></li>
        </ul>
    </div>
 
</nav>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <form >
          <div class="form-group">
            <label >Name:</label>
            <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
          </div>
          <div class="form-group">
            <label >Email:</label>
            <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
          </div>
          <div class="form-group">
            <label >tel:</label>
            <input type="text" class="form-control" value="<?php echo $tel; ?>" disabled>
          </div>
      </form>
  </div>
  <div class="col-md-4"></div>
</div>
</body>
</html>