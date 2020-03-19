<?php

 require_once('../database.php');
 
 $link = db_connect();

 $login = $_POST['login'];
 $password = $_POST['password'];

if ($result = $link->query("SELECT * FROM users WHERE name='$login'")) {
    
    $myrow = mysqli_fetch_array($result);
    
    if (empty($myrow['password']))
    {
        exit ("Извините, введённый вами логин или пароль неверный.");
    }
    else {
          if (password_verify($password, $myrow['password'])) {
          session_start();
          $_SESSION['id' ]= $myrow['id']; 
          $_SESSION['name'] = $myrow['name'];
          header("Location: index.php");
          }else {
              exit ("Извините, введённый вами логин или пароль неверный.");
           }
   }
}
$mysqli->close();

?>