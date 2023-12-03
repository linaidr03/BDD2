<?php 
session_start();

if(isset($_SESSION['nom'])) {
    //header
}
include"../inc/function.php";
 $user = true;
 $var = 1;
if(!empty($_POST)){
     $user=connectAdmin($_POST);
     if($user==false){
        print " <script> Swal.fire(
            'who are you?',
            'check you information',
            'question'
          )
    </script>";
         $var = 0;
    }
     if ($var != 0) {
         if (count($user) > 0) {
            Session_start();
            $_SESSION['id'] = $user['id'];
                     $_SESSION['email'] = $user['email'];
                  
                      $_SESSION['mdp'] = $user['mdp'];
                     
             header('location:test.html');
         }
     }
     
}

?>