<?php
function connect (){
    $DBuser = 'root';
$servername = 'localhost';
$DBpassword = '';
$DBname = "pfe";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
    return $conn;

}
function connectAdmin($data){
    $conn = connect();
    $email = $data['email'];
    $mdp = $data['mdp'];
    $requettes = "SELECT * FROM admin WHERE email='$email' AND mdp='$mdp'  " ;
    $resultat = $conn->query($requettes);
    $user = $resultat->fetch();
    
    return $user ;
}
function insAdmin($data){
  $conn = connect();
  $email = $data['email'];
  $mdp = $data['mdp'];

  $requettes = "INSERT  INTO admin VALUES  email='$email' AND mdp='$mdp'  " ;
  $resultat = $conn->query($requettes);
  $user = $resultat->fetch();
  
  return $user ;
}
?>