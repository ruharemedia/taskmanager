<?php

    require_once('database.php');
    require_once('models/functions.php');

    $link = db_connect();
    [$articles, $pages_array] = articles_all($link); 
    
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

    include('views/tasks.php');

?>