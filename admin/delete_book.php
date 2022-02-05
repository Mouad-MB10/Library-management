<?php
require '../connection.php';

		$requete= "DELETE FROM books WHERE book_id=".$_GET['bi'];
        if($pdo->exec($requete)){
            ?>
            <script>
             alert("Remove  Successfully");
             window.location.href="gerer_livre.php";
            </script>
        <?php
          }
?>