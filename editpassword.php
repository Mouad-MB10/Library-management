<?php
session_start();

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
                   <li><a href="editpassword">Change Password</a></li>
                 </ul>
          </li>
          <li class="nav-item "><a href="logout.php" class="nav-link">LogOut</a></li>
        </ul>
    </div>
 
</nav>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <form action="editpassword.php" method="POST">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id">
          </div>
          <div class="form-group">
            <label >Mot de Passe Récent:</label>
            <input type="password" class="form-control" name="rpsw" >
          </div>
          <div class="form-group">
            <label >Nouveau Mot De Passe:</label>
            <input type="password" class="form-control" name="npsw">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="modif">Modifier</button>
          </div>
      </form>
  </div>
  <div class="col-md-4"></div>
</div>
</body>
</html>
<?php


require 'connection.php';
$requete="SELECT * FROM users WHERE user_id=".$_SESSION['id'];

$_POST['id']=$_SESSION['id'];
$result=$pdo->query($requete);
$data=$result->fetchAll(PDO::FETCH_ASSOC);
$psswrd="";
foreach ($data as $row) {
    $psswrd=$row['password'];
}
if (!empty($_POST['rpsw']) && isset($_POST['modif'])) {

if($psswrd==$_POST['rpsw']) {
    $requete="UPDATE users SET password='".$_POST['npsw']."' WHERE user_id=".$_POST['id'];
    if($pdo->exec($requete)){
    ?>
    <script>
     alert("Updated Successfully");
     window.location.href="index.php";
    </script>
<?php
  }
 }
}
?>