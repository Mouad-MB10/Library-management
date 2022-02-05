<?php
require '../connection.php';

		$requete= "DELETE FROM categories WHERE cat_id=".$_GET['ci'];
        if($pdo->exec($requete)){
            ?>
            <script>
             alert("Remove  Successfully");
             window.location.href="gerer_cate.php";
            </script>
        <?php
          }
?>