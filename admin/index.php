<?php

    if(isset($_SESSION['login'])){
        header('Location:../index.php');
    }

    require_once('../database.php');
    require_once('../models/functions.php');
  
    $link = db_connect();

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        
    }else{
        $action = "";
        
    }
    if($action == "add"){
        if($_POST['name'] != "" && $_POST['email'] != "" && $_POST['textfield'] != ""){
            addNewTask($link, $_POST['name'], $_POST['email'], $_POST['textfield']);
        }else{
            header('Location: index.php');
        }
        
    }
    if($action == "update"){
        if ( $_POST['status'] == '1'){
            $status = 1;
        }
        else {
            $status = 0;
       }
        updateData($link, $_POST['id'], $_POST['textfield'],$status);
        header('Location: index.php');
    }

    [$articles, $pages_array] = articles_all($link); 

    include('../views/tasks_admin.php');
    
?>