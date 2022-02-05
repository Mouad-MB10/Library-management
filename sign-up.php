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

           <a href="index.html" class="navbar-brand">Acceuil</a>
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
   <center><h3 class="neon">User Registration Form</h3></center>
   <form action="sign-up.php" method="POST">
       <div class="form-group">
            
          <input type="text" name="name" class="form-control" required placeholder="Username" >
       </div>
       <div class="form-group">
          
          <input type="text" name="mail" class="form-control" required placeholder="Email" >
       </div>
       </div>
       <div class="form-group">
           
          <input type="password" name="psw" class="form-control" required   placeholder="Mot de passe" >
       </div>                      
      
       <div class="form-group">
         
          <input type="password" name="rpsw" class="form-control" required  placeholder="Confirmer le mot de passe">
       </div>
       <div class="form-group">
           <button type="submit"  name="add" class="button-63">Inscrire</button>
       </div>
   </form>
</div>
</body>
</html>
<?php
 if (!empty($_POST['name'])) {
     if (isset($_POST['add'])) {
       if ($_POST['psw']==$_POST['rpsw']) {
          $requete="INSERT INTO users(name,email,password) VALUES('".$_POST['name']."','".$_POST['mail']."','".$_POST['psw']."')";
          
          if ($pdo->exec($requete)) {
              echo "<script>alert(\"bien ajouter\")</script>";
              //header("location:index.php");
              echo "<script>window.location.href=\"index.php\"</script>";
          }else {
            echo "<script>alert(\"Error\")</script>";
          }
       }
     }
 }
?>
