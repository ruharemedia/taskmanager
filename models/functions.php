<?php

    function articles_all($link){
        if(isset($_GET['page'])){
            
        $page = $_GET['page'];
            
        }else{
            $page = 1;
        }
        $num = 3;
        $from = ($page - 1) * $num;
        
        $query = 'SELECT * FROM articles  LIMIT '.$from.','.$num.'';
        
        $start_new_link = 0;
        
        if(isset($_GET['sort'])){
            $name = $_GET['sort'];
            $type = $_GET['type'];
            
            $query = 'SELECT * FROM articles ORDER BY '.$name.' '.$type.' LIMIT '.$from.','.$num.'';
            $start_new_link = 1;
        }
        
        $result = mysqli_query($link, $query);
        
        if(!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows($result);
        $articles = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
        
        $taskResult = $link->query("SELECT COUNT(*) as count FROM articles");
        $count = mysqli_fetch_assoc($taskResult)['count'];
        $pagesCount = ceil($count / $num);
       
        $pages_array = array();
        
        if($start_new_link == 1){
            for($i = 1; $i <= $pagesCount; $i++) {
            $pages_array[] = '<li><a href="?page='.$i.'&sort='.$name.'&type='.$type.'">'.$i.'</a></li>';
          }
        }else{
             for($i = 1; $i <= $pagesCount; $i++) {
            $pages_array[] = '<li><a href="?page='.$i.'">'.$i.'</a></li>';
          }
        }
        
        return [$articles, $pages_array];
    }


    function selectOneTask($link, $id){
         $query = 'SELECT * FROM articles WHERE id='.$id.'';
         $result = mysqli_query($link, $query);
        
         if(!$result)
            die(mysqli_error($link));
        
         $n = mysqli_num_rows($result);
         $articles = array();
        
         for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $task[] = $row;
         }
        return($task);
    }

    function updateData($link, $id, $text, $status){
         $query = 'UPDATE articles SET textfield="'.$text.'", status="'.$status.'" WHERE id='.$id.'';
         $result = mysqli_query($link, $query);
        
         if(!$result)
            die(mysqli_error($link));
    }

    function addNewTask($link, $name, $email, $text){
        $status = 0;
        
        $query = "INSERT INTO articles (name, email, textfield, status) VALUES ('$name', '$email', '$text', '$status')";;
        
        $result = mysqli_query($link, $query);
        
        if(!$result)
            die(mysqli_error($link));
    }

?>