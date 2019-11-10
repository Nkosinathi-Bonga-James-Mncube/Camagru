<?php

function get_likes()
{
    $value = $_GET['p'];
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM likes WHERE name_img = :name_img';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name_img'=>$value]);
    $post= $stmt->fetchAll();
    foreach($post as $post)
    {
        $n_l = $post['likes'];
    }
    return($n_l);
}
function get_likes_flag()
{
    
    //echo($_GET['p']);
    //echo("im here");
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM likes WHERE name_img = :name_img AND verf_code = :verf_code';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name_img'=>$_GET['p'], 'verf_code'=>$_SESSION['verf_no']]);
    $post= $stmt->fetchAll();
    foreach($post as $post)
    {
        $flag_f = $post['flag'];
    }
    return($flag_f);
}

function get_verf()
{
    $value = $_GET['p'];
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM likes WHERE verf_code = :verf_code';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['verf_code'=>$_SESSION['verf_no']]);
    $post= $stmt->fetchAll();
    foreach($post as $post)
    {
        $verf_l = $post['verf_code'];
    }
    return($verf_l);
}

function get_images()
{
    $value = $_GET['p'];
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM likes WHERE name_img = :name_img';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name_img'=>$_GET['name_img']]);
    $post= $stmt->fetchAll();
    var_dump();
    foreach($post as $post)
    {
        $image_l = $post['name_img'];
    }
    return($image_l);
}

function get_update()
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
 
    $like_no = get_likes();
    //$check_flag = get_likes_flag();
    //echo(get_verf());
    $like_no = $like_no + 1;
    $p_name = $_GET['p'];
    //if (get_likes() == 0)

    if (get_likes_flag() == 0 && get_verf() != 0)
    {
        echo(get_likes_flag());
        $sql2 ='UPDATE likes SET verf_code = :verf_code,flag = :flag,likes = :likes WHERE name_img = :name_img';
        $stmt1 = $pdo->prepare($sql2);
        $stmt1->execute(['verf_code'=>$_SESSION['verf_no'],'flag'=>'1','likes' =>$like_no,'name_img' => $_GET['p']]);
    }
  
    //header("Refresh:0");
}

function get_insert()
{
    try
    {   
        include "config/database.php";
        include_once "config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        if ($_POST['comment'] != NULL)
        {
            $sql3 = $pdo->prepare("INSERT INTO comments(comments,name_img,flag,verf_no) VALUES (:comments,:name_img,:flag,:verf_no)");
            $sql3->execute(['comments'=>htmlspecialchars(strip_tags(trim($_POST['comment']))),'flag'=>'1','name_img'=>$_GET['p'],'verf_no'=>$_SESSION['verf_no']]);
        }
    }
    catch(PDOException $e2)
    {
        echo $sql2 . "<br>" . $e2->getMessage();
        $pdo =  NULL;
    }
    header("Refresh:0");
}

function get_comments()
{
    include "config/database.php";
    include_once "config/connection.php";
    include "get_name.php";
    $image = $_GET['p'];
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql5 = 'SELECT * FROM comments WHERE flag = :flag AND name_img = :name_img';
    $stmt = $pdo->prepare($sql5);
    $stmt->execute(['flag'=>'1' , 'name_img'=>$_GET['p']]);
    $post= $stmt->fetchAll();
    foreach($post as $post)
    {
        $text_input = $post['comments'];
        $p_name = $post['verf_no'];
        $name = trim(get_name($p_name));
        $date = date("H:iA",strtotime($post['created']));
        if ($text_input == NULL)
        {
            echo("its empty");
        }
        if(isset($text_input))
        {
            echo("$name"."[$date]".": ".trim($text_input)."\n");
        }
    }
}
function get_delete()
{
    
}
?>