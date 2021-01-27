<?php

function private_nav()
{
    if (!isset($_POST['Next']))
        {
            $_SESSION['num'] = -5;
        }
        if ($_SESSION['num'] >= -5 && $_SESSION['num'] +5  <= private_page_count())
        {
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
        }
}
function private_page_count()
{
    include ".././config/database.php";
    include_once ".././config/database.php";

    $pdo = DB_Connection($DB_DSN,$DB_NAME, $DB_USER,$DB_PASSWORD);
    $stmt = $pdo->prepare('SELECT * FROM images');
    $stmt->execute(['1']);
    $value = $stmt->rowCount();
    return($value);
}

function private_display_images()
{
    include ".././config/database.php";
    include_once ".././config/database.php";

    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $stmt = $pdo->prepare('SELECT * FROM images ORDER BY created DESC LIMIT '.$_SESSION['num'].',5');
    $stmt->execute([$_SESSION['verf_no']]);
    $post = $stmt->fetchAll();

    foreach($post as $post)
    {
        $file_pic = pathinfo($post['pic_location']);
        // echo'<a href ="./image_details.php?i='.$file_pic['filename'].'">
        // <img width=200px heigth=200px src='.$stmt['pic_location'].'>
        // <p>'.$stmt['name_img'].'</p>
        // </a>';
        echo'<a href ="./image_details.php?i='.$file_pic['filename'].'">
        <div class="col mr-3">
        <div class="thumbnail">
        <span data-msg="You have new messages">
        <img class="img_gallery" src='.$post['pic_location'].'>
        <div class="text-wrap text-center" style="width: 13rem;">'.$post['name_img'].'</div>
        <span class="badge">3</span>
        </span>
        </div>
        </div> 
        </a>';
    }
}

function public_nav()
{
    if (!isset($_POST['Next']))
        {
            $_SESSION['num'] = -5;
        }
        if ($_SESSION['num'] >= -5 && $_SESSION['num'] +5  <= public_page_count())
        {
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
        }
}

function public_page_count()
{
        include ".././config/database.php";
        include_once ".././config/connection.php";

        $pdo = DB_Connection($DB_DSN,$DB_NAME, $DB_USER,$DB_PASSWORD);
        $stmt = $pdo->prepare('SELECT * FROM images');
        $stmt->execute();
        $value = $stmt->rowCount();
        return($value);
}

function public_display_images()
{
    include ".././config/database.php";
    include_once ".././config/connection.php";

    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);

    $stmt = $pdo->prepare('SELECT * FROM images ORDER BY created DESC LIMIT '.$_SESSION['num'].',5');
    $stmt->execute(); 
    foreach($stmt as $stmt)
    {
        $file_pic = pathinfo($stmt['pic_location']);
        echo'<a href ="./image_details.php?i='.$file_pic['filename'].'">
        <div class="col mr-3">
        <div class="thumbnail">
        <span data-msg="You have new messages">
        <img class="img_gallery" src='.$stmt['pic_location'].'>
        <div class="text-wrap text-center" style="width: 13rem;">'.$stmt['name_img'].'</div>
        <span class="badge">3</span>
        </span>
        </div>
        </div> 
        </a>';
    }
}
?>