<?php
 require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="csss.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-inverse" style=" position: absolute;
    left: 430px;
   top: 30px;
    z-index: 2;
    ">
    <div class="container-fluid">
        <div class="navbar-header">

           <a href="acceuil/index.html" class="navbar-brand">Acceuil</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
         <li class="nav-item">
           <a href="admin/index.php" class="nav-link"><span class="glyphicon glyphicon-user"></span> Login Admin</a>
         </li>
         <li class="nav-item">
          <a href="index.php" class="nav-link"><span class="glyphicon glyphicon-user"></span> Login Utilisateur</a>
         </li>
         <li class="nav-item">
          <a href="sign-up.php" class="nav-link"><span class="glyphicon glyphicon-log-in"></span> Inscription</a>
         </li>
       </ul>
    </div>

</nav>
<div class="container text-center" id="main_content">
    <div class="hol">
   <center><h3 sty class="neon">User Login Form</h3></center> </div>
   <form action="index.php" method="POST">
       <div class="form-group">
          
           <div class="group">
          <input type="text" name="mail" class="form-control" required >
           <span class="highlight"></span>
      <span class="bar"></span>
     <label for="name">Email:</label> 
       </div>
       <div class="form-group">
          
             <div class="group">

          <input type="password" name="psw" class="form-control" required >
           <span class="highlight"></span>
      <span class="bar"></span>
       <label for="name">mot de passe:</label> 
    
       </div>
       <div class="form-group">
           <button type="submit" name="log" class="button-63">Log In</button>
           <h4> Vous N'avez pas Un compte? <a href="sign-up.php">Inscrire Ici!</a> </h4>
       </div>
   </form>
</div>
</body>
</html>
<?php
require 'connection.php';
session_start();
if (!empty($_POST['mail'])) {
    if (isset($_POST['log'])){
        $requete="SELECT * FROM users WHERE email='".$_POST['mail']."'"." AND password='".$_POST['psw']."'";
        $result=$pdo->query($requete);
        $data=$result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            if ($row['email']==$_POST['mail'] && $row['password']==$_POST['psw']) {
                $_SESSION['name']=$row['name'];
                $_SESSION['email']=$row['email'];
                $_SESSION['id']=$row['user_id'];
                header("location:userdashbord.php");
            }else {
                echo "<br><br><br><center><span class=\"alert-danger\">Error</span></center>";
            }
         }
        }
}
?>

