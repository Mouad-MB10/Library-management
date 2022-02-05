<?php
session_start();
require '../connection.php';
$requete="SELECT * FROM categories";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

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
                 <a class="nav-link dropdown-toggle"  data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['name']; ?> </a>
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
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#e3f2fd;">
<div class="container-fluid">
 <ul class="nav navbar-nav navbar-center">
 <li class="nav-item">
         <a href="admindashbord.php" class="nav-link">Dashbord</a>
     </li>
     <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" data-toggle="dropdown">Livres</a>
         <ul class="dropdown-menu">
                <li><a href="ajouter_livre.php">Ajouter Nouveau livre</a></li>
                <li><a href="gerer_livre.php">gérer les livres</a></li>
         </ul>
     </li>
     <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" data-toggle="dropdown">Catégories</a>
         <ul class="dropdown-menu">
                <li><a href="ajouter_cate.php">Ajouter Nouveau Catégories</a></li>
                <li><a href="gerer_cate.php">gérer les Catégories</a></li>
         </ul>
     </li>
     <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" data-toggle="dropdown">Auteur</a>
         <ul class="dropdown-menu">
                <li><a href="ajouter_auteur.php">Ajouter Nouveau Auteur</a></li>
                <li><a href="gerer_auteur.php">gérer les Auteurs</a></li>
         </ul>
     </li>

 </ul>
</div>
</nav>
<br><br><br><br>
<div class="col-md-2"></div>
<div class="col-md-8">
    <table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>Categorie ID</th>
              <th>Categorie Name</th>
              <th>Action</th>
          </tr>
          
        <?php
        foreach ($data as $row) {
         $categorie_id=$row['cat_id'];
         $categorie_name=$row['cat_name'];
         ?>
             <tr>
             <td><?php echo  $categorie_id;?></td>
             <td><?php echo  $categorie_name;?></td>
             <td>
                 <button class="btn"><a href="edit_cat.php?ci=<?php echo $row['cat_id']; ?>">Edit</a></button>
                 <button class="btn"><a href="delete_cat.php?ci=<?php echo $row['cat_id']; ?>">Delete</a></button>
            </td>
            </tr>
         <?php }
     ?>
      </thead>
    </table>
</div>
<div class="col-md-2"></div>
<div></div>
</body>
</html>