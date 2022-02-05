<?php
require '../connection.php';

		$requete= "DELETE FROM auteurs WHERE auteur_id=".$_GET['ai'];
        if($pdo->exec($requete)){
            ?>
            <script>
             alert("Remove  Successfully");
             window.location.href="gerer_auteur.php";
            </script>
        <?php
          }
?>