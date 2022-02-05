<?php
session_start();
require 'connection.php';
$requete="SELECT * FROM books WHERE book_id=".$_SESSION['id'];
$result=$pdo->query($requete);
$data=$result->fetchAll(PDO::FETCH_ASSOC);

?>

<embed type="application/pdf" src="admin/pdf/<?php echo $data[0]['pdf'] ; ?>" width="100%" height="80%">