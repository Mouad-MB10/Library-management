<?php
require '../connection.php';
session_start();
$requete="UPDATE admins SET name='".$_GET['name']."' ,email='".$_GET['eml']."' ,mobile=".$_GET['tel']." WHERE id=".$_GET['id'];
$pdo->exec($requete);
?>
<script>
    alert("Updated Successfully");
    window.location.href="index.php";
</script>