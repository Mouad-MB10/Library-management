<?php
 require '../connection.php';
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
    <title>Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
           <a href="/biblio/index.php" class="navbar-brand">Gestion Bibliothéque</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
         <li class="nav-item">
           <a href="index.php" class="nav-link"><span class="glyphicon glyphicon-user"></span> Admin Login</a>
         </li>

       </ul>
    </div>

</nav>
<div class="container text-center" id="main_content">
   <center><h3>Admin Login Form</h3></center>
   <form action="index.php" method="POST">
       <div class="form-group">
           <label for="name">Email:</label> 
          <input type="text" name="mail" class="form-control" required >
       </div>
       <div class="form-group">
           <label for="name">mot de passse:</label> 
          <input type="password" name="psw" class="form-control" required >
       </div>
       <div class="form-group">
           <button type="submit" name="log" class="btn btn-primary">Log In</button>
       </div>
   </form>
</div>
</body>
</html>
<?php
require '../connection.php';
session_start();
if (!empty($_POST['mail'])) {
    if (isset($_POST['log'])){
        $requete="SELECT * FROM admins WHERE email='".$_POST['mail']."'"." AND password='".$_POST['psw']."'";
        $result=$pdo->query($requete);
        $data=$result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            if ($row['email']==$_POST['mail'] && $row['password']==$_POST['psw']) {
                $_SESSION['name']=$row['name'];
                $_SESSION['email']=$row['email'];
                $_SESSION['id']=$row['id'];
                header("location:admindashbord.php");
            }else {
                echo "<br><br><br><center><span class=\"alert-danger\">Error</span></center>";
            }
         }
        }
}
?>

