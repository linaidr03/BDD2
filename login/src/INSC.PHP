<?php

// recuperation des donnée du formul 
$email = $_POST['email'];
$nom=$_POST['nom'];
$mdp = $_POST['mdp'];


//$categorie = $_POST['categorie'];


  session_start();

//la chaine de connexion 

include "../inc/function.php";
$conn = connect();
 

// Vérifier si l'email est déjà utilisé
$count = "SELECT COUNT(*) FROM admin WHERE email = '$email'";
$result = $conn->query($count);
$count = $result->fetchColumn();

if($count > 0){
   //L'email est déjà utilisé, afficher un message d'erreur ou prendre une autre action
 header('location:indexx_admin.php?existadmin=ok');
} else {
// creation du requette
$requette = "INSERT INTO admin (email,mdp,nom) VALUES ('$email','$mdp','$nom')";
 
// execution de requette 
$resultat = $conn->query($requette);
//redirection apres l'ajout a la BDD
 if($resultat){
    header('location:test.html?ajoutadmin=ok');
 }
}
