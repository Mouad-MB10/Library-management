<?php
session_start();
require 'connection.php';
function get_book_count(){
  require 'connection.php';
  $requete="SELECT count(*) as book_count FROM books";
  $result=$pdo->query($requete);
  $data=$result->fetchAll(PDO::FETCH_ASSOC);
  $book_count="";
  foreach ($data as $row) {
    $book_count=$row['book_count'];
  }
  return $book_count;
}
$book=get_book_count();
$requete="SELECT * FROM books";
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
           <a href="userdashbord.php" class="navbar-brand">User Dashbord</a>
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
<div class="container text-center">
   <?php 
     for ($i=0; $i <$book ; $i++) { ?>
            <div class="col-md-3">
            <div class="card bg-light" style="width:300px;">
      <div class="card-header">Book Info:</div>
      <div class="card-body">
          <p class="card-text"><br>
             <img src="admin/images/<?php echo  $data[$i]['images'];?>" alt="" width="60px" height="60px"><br>
             <?php  echo $data[$i]['book_name'];
          ?></p>
          <form action="userdashbord.php" method="GET">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id'] ;?>">
            <input type="hidden" name="id_book" value="<?php echo  $data[$i]['book_id']; ?>">
            <button type="submit" name="send" class="btn btn-primary">Downolad</button>
          </form>
      </div>
     </div>     
        </div>
        
       <?php }
   ?>

</div>
</body>
</html>
<?php
if (isset($_GET['send'])) {
   $requete="INSERT INTO dbooks(user_id,book_id) VALUES(".$_GET['id_user'].",".$_GET['id_book'].")";
   if($pdo->exec($requete)){
     header("Location:download.php");
  }
}
?>
