<?php

function get_likes()
{
    $value = $_GET['p'];
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM likes WHERE name_img = :name_img AND verf_code = :verf_code';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name_img'=>$value, 'verf_code'=>$_SESSION['verf_no']]);
    $post= $stmt->fetchAll();
    $n_l = NULL;
    foreach($post as $post)
    {
        $n_l = $post['likes'];
    }
    if (!$n_l)
    {
        $n_l = 0;

        if (get_verf() == NULL)
        {
            include "config/database.php";
            include_once "config/connection.php";
            $pdo = DB_Connection($DB_DSN,$DB_NAME,$DB_USER,$DB_PASSWORD);
            $sql = $pdo->prepare("INSERT INTO likes(name_img,verf_code,flag,likes) VALUES (:name_img,:verf_code,:flag,:likes)");
            $sql->execute(['name_img'=>$_GET['p'],'verf_code'=>$_SESSION['verf_no'],'flag'=>'0','likes'=>'0']);
        }
    }
        

    return($n_l);
}
function get_com_verf()//Email
  {  
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM images WHERE name_img = :name_img';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name_img'=>$_GET['p']]);
    $post= $stmt->fetchAll();
    foreach($post as $post)
    {
        $flag_f = $post['verf_code'];
    }
    if ($flag_f != $_SESSION['verf_no'])
    {
        include "config/database.php";
        include_once "config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $sql2 = 'SELECT * FROM table1 WHERE verf = :verf';
        $stmt1 = $pdo->prepare($sql2);
        $stmt1->execute(['verf'=>$flag_f]);
        $post= $stmt1->fetchAll();
        foreach($post as $post)
        {
            $email= $post['email'];
        }
    }
    return($email);
}

function get_verf()//for likes!
{
    $value = isset($_GET['p']);
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM likes WHERE verf_code = :verf_code AND name_img = :name_img';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['verf_code'=>$_SESSION['verf_no'] , 'name_img'=>isset($_GET['p'])]);
    $post= $stmt->fetchAll();
    $verf_l = NULL;
    foreach($post as $post)
    {
        $verf_l = $post['flag'];
    }
    return($verf_l);
}

function get_email_note()//notification
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM images WHERE name_img = :name_img';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name_img'=>$_GET['p']]);
    $post= $stmt->fetchAll();

    foreach($post as $post)
    {
        $v_image = $post['verf_code'];
    }

    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM table1 WHERE verf = :verf';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['verf'=>$v_image]);
    $post= $stmt->fetchAll();
    foreach($post as $post)
    {
        $note = $post['note'];
    }
    return($note);
}

function get_update()//likes
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);

        $sql2 ='UPDATE likes SET flag = :flag,likes = :likes WHERE name_img = :name_img AND verf_code= :verf_code';
        $stmt1 = $pdo->prepare($sql2);
        
        if (get_verf() == 0)
        {
            $stmt1->execute(['flag'=>'1','likes' =>'1','name_img' => $_GET['p'],'verf_code'=>$_SESSION['verf_no']]);
            if (get_email_note() == 1)    
            {
                    email_likes();
            }
        }
        else
        {
            $stmt1->execute(['flag'=>'0','likes' =>'0','name_img' => $_GET['p'],'verf_code'=>$_SESSION['verf_no']]);
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
            $msg = htmlspecialchars(strip_tags(trim($_POST['comment'])));
            $sql3 = $pdo->prepare("INSERT INTO comments(comments,name_img,flag,verf_no) VALUES (:comments,:name_img,:flag,:verf_no)");
            $sql3->execute(['comments'=>$msg,'flag'=>'1','name_img'=>$_GET['p'],'verf_no'=>$_SESSION['verf_no']]);
            //if (get_note_flag())
            if (get_email_note() == 1)
            {
                email_comments($msg);
            }
            
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
        if(isset($text_input))
        {
            echo("$name"."[$date]".": ".trim($text_input)."\n");
        }
    }
}
function get_delete()//delete function
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'DELETE FROM images WHERE name_img = :name_img AND verf_code = :verf_code';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name_img'=>$_GET['p'], 'verf_code'=>$_SESSION['verf_no']]);
    header("Location: http://localhost:8080/Camagru/grid.php");
}
function email_comments($msg)
{

    $email = get_com_verf();
    $name = get_name($_SESSION['verf_no']);
    $to = $email;
    $subject = "Notifcation of comment";
    $txt = "$name has made a comment on your $image image<br>-------------<br>Message : $msg <br>-----------------<br>To see other messages, click here to head back to our site : <a href = 'http://localhost:8080/Camagru/index.php?'>Login in</a>";
    $headers = "From:nonreply@localhost:8080 \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    mail($to,$subject,$txt,$headers);
}

function note_flag($status)
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);

    $sql2 ='UPDATE table1 SET note = :note WHERE verf = :verf';
    $stmt1 = $pdo->prepare($sql2);
    if ($status == false)
    {
            $stmt1->execute(['note'=>'0','verf' => $_SESSION['verf_no']]);
    }
    else
    {
        $stmt1->execute(['note'=>'1','verf' => $_SESSION['verf_no']]);
    }
}

function get_note_flag()
{
    include "config/database.php";
    include_once "config/connection.php";
    $flag = NULL;
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM table1 WHERE verf = :verf';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['verf'=>$_SESSION['verf_no']]);
    $post= $stmt->fetchAll();
    //var_dump($post);
    foreach($post as $post)
    {
        $flag = $post['note'];
    }

    return($flag);
}


function email_likes()
{
    $email = get_com_verf();
    echo("The email is ".$memail. "<br>");
    $name = get_name($_SESSION['verf_no']);
    $image = $_GET['p'];

    $to = $email;
    $subject = "Notification of Likes";
    $txt = "$name has liked your $image image<br>-------------<br>To see other liked images, click here to head back to our site : <a href = 'http://localhost:8080/Camagru/index.php?'>Login in</a>";
    $headers = "From:nonreply@localhost:8080 \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    mail($to,$subject,$txt,$headers);
}

?>