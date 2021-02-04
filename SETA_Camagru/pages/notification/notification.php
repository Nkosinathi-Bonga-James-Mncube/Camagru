<?php
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
    $sql11_image = 'SELECT * FROM comments WHERE name_img = :name_img AND verf_no != :verf_no';
    $stmt_image = $pdo->prepare($sql11_image);
    $x = pathinfo($value);
    $stmt_image->execute(['name_img' => $x['filename'],'verf_no' => $_SESSION['verf_no']]);
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