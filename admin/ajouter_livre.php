<?php
session_start();
require 'functions.php';
require '../connection.php';
//auteurs
$requetaut="SELECT * FROM auteurs";
$resultaut=$pdo->query($requetaut);
$dataaut=$resultaut->fetchAll(PDO::FETCH_ASSOC);
//categories
$requetcat="SELECT * FROM categories";
$resultcat=$pdo->query($requetcat);
$datacat=$resultcat->fetchAll(PDO::FETCH_ASSOC);
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
<div class="row">
 <div class="col-md-4"></div>
 <div class="col-md-4">
     <form action="ajouter_livre.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label >Book Name:</label>
            <input type="text" class="form-control" name="book_name">
          </div>
          <div class="form-group">
            <label >Book Auteur:</label>
            <select class="form-control" name="auteur" >
                  <option value="">-Select Auteur-</option>
                    <?php 
                       foreach ($dataaut as $row) { ?>
                           <option value="<?php echo $row['auteur_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php
                      }
                    ?>
              </select>
          </div>
          <div class="form-group">
            <label >Add Book:</label>
            <input  type="file" name="pdf" class="form-control" >
          </div>
          <div class="form-group">
            <label >Add Image:</label>
            <input  type="file" name="image" class="form-control" >
          </div>
          <div class="form-group">
            <label >Category Name:</label>
            <select class="form-control" name="cat" >
                  <option value="">-Select Categorie-</option>
                    <?php 
                       foreach ($datacat as $row) { ?>
                           <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                        <?php
                      }
                    ?>
              </select>
          </div>
          <div class="form-group">
            <label >Book Numbers:</label>
            <input type="text" class="form-control" name="book_number">
          </div>

          
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="ajout_livre">Ajouter</button>
          </div>
     </form>
 </div>
 <div class="col-md-4"></div>
</div>
</body>
</html>
<?php
require '../connection.php';
if (!empty($_POST['book_name'])) {
  if (isset($_POST['ajout_livre'])) {
      //pdf file
       $pdf=$_FILES['pdf']['name'];
       $pdf_type=$_FILES['pdf']['type'];
       $pdf_size=$_FILES['pdf']['size'];
       $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
       $pdf_store="pdf/".$pdf;
       move_uploaded_file($pdf_tem_loc,$pdf_store);
      //image file 
      $img=$_FILES['image']['name'];
      $img_type=$_FILES['image']['type'];
      $img_size=$_FILES['image']['size'];
      $img_tem_loc=$_FILES['image']['tmp_name'];
      $img_store="images/".$pdf;
      move_uploaded_file($img_tem_loc,$img_store);
       $requete1="INSERT INTO books(book_name,images,pdf,auteur_id,cat_id,book_no) 
       VALUES('".$_POST['book_name']."','".$img."','".$pdf."',".$_POST['auteur'].",".$_POST['cat'].
       ",".$_POST['book_number'].")";
       /*$requete2="INSERT INTO categories(cat_name) VALUES('".$_POST['categorie_name']."')";
       $requete3="INSERT INTO auteurs(name) VALUES('".$_POST['book_auteur']."')";*/
       if($pdo->exec($requete1)){
        ?>
        <script>
         alert("Insertion Successfully");
         window.location.href="gerer_livre.php";
        </script>
    <?php
      }
}

}
?>