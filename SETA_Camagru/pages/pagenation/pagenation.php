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
        echo'<a href ="./image_details.php?i='.$file_pic['filename'].'">
        <div class="col mr-3">
        <div class="thumbnail">
        <span data-msg="You have new messages">
        <img class="img_gallery" src='.$post['pic_location'].'>
        <div class="text-wrap text-center" style="width: 13rem;">'.$post['name_img'].'</div>';
        if (notification_tag($post['re_name_img']))
        {
            echo '<span class="badge">New</span>';
        }
        echo' 
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
        <div class="text-wrap text-center" style="width: 13rem;">'.$stmt['name_img'].'</div>';
    }
    
}

function display_image()
{
    include ".././config/database.php";
    include_once ".././config/connection.php";

    $results=$_GET['i'];
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $stmt = $pdo->prepare('SELECT * FROM images');
    $stmt->execute();
    $post = $stmt->fetchAll();
    $pic_name=NULL;
    
    foreach($post as $post)
    {
        $database_results=pathinfo($post['pic_location']);
        if ($results == $database_results['filename'])
        {
            $pic_name=$post['pic_location'];

        }
    }

    echo'<img id="comment-image" src="'.$pic_name.'">';
    return  $pic_name;
}

function delete_button($re_img_name)
{
    
    if (hide_delete($re_img_name))
    {
        echo '
    <form method="POST">
    <button name="delete_img" type="submit" id="image-detail-button"class="btn btn-danger form-group text-center">Delete</button>
    </form>';
    }

    if(isset($_POST['delete_img']))
    {
        $results = pathinfo($re_img_name);
        $base_results = $results['basename'];
        include ".././config/database.php";
        include_once ".././config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $sql = 'DELETE FROM images WHERE re_name_img = :re_name_img';
        $stmt = $pdo->prepare($sql);
        echo $base_results;
        $stmt->execute(['re_name_img'=>$base_results]);
        header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/private_gallery.php");
    }
}
function hide_delete($re_img_name)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";

    $results = pathinfo($re_img_name);
    $base_results = $results['basename'];
    // echo $base_results;
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $stmt = $pdo->prepare('SELECT * FROM images WHERE re_name_img = :re_name_img');
    $stmt->execute(['re_name_img'=>$base_results]);
    $post = $stmt->fetchAll();
    foreach ($post as $post)
    {
        if ($_SESSION['verf_no']==$post['verf_code'])
        // echo "your pic";
        return true;
    }

}


?>
