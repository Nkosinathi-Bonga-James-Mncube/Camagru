<?php

function get_note_flag()
{
    include "../config/database.php";
    include_once "../config/connection.php";
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
    echo $flag."flag";
    return($flag);
}

function note_flag($status)
{
    include "../config/database.php";
    include_once "../config/connection.php";
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
function get_all_likes()
{
    include ".././config/database.php";
    include_once ".././config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM Likes';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $count=$stmt->rowCount();
    $post= $stmt->fetchAll();
    $n_l = NULL;
    $k = get_images();
    
    foreach($post as $post)
    {
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $n_found = NULL;
        $sql11 = 'SELECT * FROM images WHERE verf_code = :verf_code';
        $stmt = $pdo->prepare($sql11);
        $stmt->execute(['verf_code' => $_SESSION['verf_no']]);
        $k = $stmt->fetchAll();
        foreach($k as $k)
        {
            if ($k['re_name_img'] == $post['name_img'])
            {
                return($post['name_img']);
            }
        }
    }
    return(0);
}
function find_image_location($pic_name)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";

    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $n_found = NULL;
    $sql11 = 'SELECT * FROM images WHERE re_name_img = :re_name_img';
    $stmt = $pdo->prepare($sql11);
    $stmt->execute(['re_name_img' => $pic_name]);
    $post = $stmt->fetchAll();
    foreach($post as $post)
    {
        $result = $post['pic_location'];
    }
    return $result; 
}
function get_images()
{
    include ".././config/database.php";
    include_once ".././config/connection.php";

    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $n_found = NULL;
    $sql11 = 'SELECT * FROM images WHERE verf_code = :verf_code';
    $stmt = $pdo->prepare($sql11);
    $stmt->execute(['verf_code' => $_SESSION['verf_no']]);
    $post = $stmt->fetchAll();
    return $post;
}

function notification_tag($value)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql11_image = 'SELECT * FROM Likes WHERE name_img = :name_img';
    $stmt_image = $pdo->prepare($sql11_image);
    $x = pathinfo($value);
    $stmt_image->execute(['name_img' => $x['filename']]);
    $post2 = $stmt_image->fetchAll();
    foreach ($post2 as $post2)
    {
        if ($post2['name_img'] == $x['filename'])
        {
            return 'New';
        }
    }
}
?>