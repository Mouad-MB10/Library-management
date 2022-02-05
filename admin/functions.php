<?php

function get_user_count(){
 require '../connection.php';
$requete="SELECT count(*) as user_count FROM users";
$result=$pdo->query($requete);
$data=$result->fetchAll(PDO::FETCH_ASSOC);
$user_count="";
foreach ($data as $row) {
  $user_count=$row['user_count'];
}
return $user_count;
}
function get_book_count(){
    require '../connection.php';
    $requete="SELECT count(*) as book_count FROM books";
    $result=$pdo->query($requete);
    $data=$result->fetchAll(PDO::FETCH_ASSOC);
    $book_count="";
    foreach ($data as $row) {
      $book_count=$row['book_count'];
    }
    return $book_count;
}
function get_categorie_count(){
    require '../connection.php';
    $requete="SELECT count(*) as categorie_count FROM categories";
    $result=$pdo->query($requete);
    $data=$result->fetchAll(PDO::FETCH_ASSOC);
    $categorie_count="";
    foreach ($data as $row) {
      $categorie_count=$row['categorie_count'];
    }
    return $categorie_count;
}
function get_auteur_count(){
    require '../connection.php';
    $requete="SELECT count(*) as auteur_count FROM auteurs";
    $result=$pdo->query($requete);
    $data=$result->fetchAll(PDO::FETCH_ASSOC);
    $auteur_count="";
    foreach ($data as $row) {
      $auteur_count=$row['auteur_count'];
    }
    return $auteur_count;
}
function get_issue_count(){
    require '../connection.php';
    $requete="SELECT count(*) as issue_count FROM issues";
    $result=$pdo->query($requete);
    $data=$result->fetchAll(PDO::FETCH_ASSOC);
    $auteur_count="";
    foreach ($data as $row) {
      $auteur_count=$row['issue_count'];
    }
    return $auteur_count;
}
?>