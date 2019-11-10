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

function get_update()
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
 
    $like_no = get_likes();
    $like_no = $like_no + 1;
    $p_name = $_GET['p'];
    if (get_likes() == 0)
    {
        $sql2 ='UPDATE likes SET likes = :likes WHERE name_img = :name_img';
        $stmt1 = $pdo->prepare($sql2);
        $stmt1->execute(['likes'=>$like_no,'name_img' => $_GET['p']]);
    }
    header("Refresh:0");
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
            $sql3 = $pdo->prepare("INSERT INTO comments(comments,flag,verf_no) VALUES (:comments,:flag,:verf_no)");
            $sql3->execute(['comments'=>htmlspecialchars(strip_tags(trim($_POST['comment']))),'flag'=>'1','verf_no'=>$_SESSION['verf_no']]);
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
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql5 = 'SELECT * FROM comments WHERE flag = :flag';
    $stmt = $pdo->prepare($sql5);
    $stmt->execute(['flag'=>'1']);
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