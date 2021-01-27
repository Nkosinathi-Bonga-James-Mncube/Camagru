<?php
function error_check_input($enter_user,$enter_email,$enter_pass1,$enter_pass2)
{
    
    $up = preg_match('@[A-Z]@',$enter_pass1);
    $lo = preg_match('@[a-z]@',$enter_pass1);
    $sp = preg_match('@[^\w]@',$enter_pass1);


    if ($enter_user == NULL || $enter_email == NULL || $enter_pass1 == NULL || $enter_pass2 == NULL)
    {
        
        echo ("Please check username,surname,password are entered"."<br>");
        return(1);
    }
    else if ($enter_pass1 != $enter_pass2)
    {
        echo ('Password are not identical');
        return (2);
    }
    else if (strlen($enter_pass1)<8)
    {
        echo ('Password must be 8 characters(with no spaces) or greater'."<br>");
        return(3);
    }
    else if (preg_match('/\s/',$enter_user) || preg_match('/\s/',$enter_email)|| preg_match('/\s/',$enter_pass1))
    {
        echo ("There are space in username,password or email". "<br>");
        return(4);
    }
    else if (!$up |!$lo|!$sp)
    {
        echo ("Weak password.Please make sure passsword has:"."<br>");
        echo ("> At least one uppercase"."<br>");
        echo ("> At least one lowercase"."<br>");
        echo ("> At least one special character"."<br>");
        return(5);
    }
    else if (!filter_var($enter_email,FILTER_VALIDATE_EMAIL))
    {
        echo("Please enter valid email address". "<br>");
        return(6);
    }
    else
    {
        return(-1);
    }

}

function check_image($p1,$input_image,$pic_loc)
{
    if ($_FILES[$input_image]['size'] > 10485760)
    {
        echo ("Image is too big");
        return (1);
    }
    if(!(pathinfo($p1,PATHINFO_EXTENSION) == 'jpg'|| pathinfo($p1,PATHINFO_EXTENSION) == 'png'|| pathinfo($p1,PATHINFO_EXTENSION) == 'bmp' || pathinfo($p1,PATHINFO_EXTENSION) == 'jpeg'))
    {
        echo ("Not a valid filetype. Please uplaod '.jpg','.jpeg', '.bmp' or '.bmp'");
        return (1);
    }
    if (get_image($pic_loc) != NULL)
    {
        echo("Filename already exist.Please rename your image");
        return (1);
    }
    return(-1);
} 

function search_dup_new_name($enter_email,$enter_user)
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql4 = 'SELECT * FROM table1 WHERE email = :email OR username = :username';
    $stmt = $pdo->prepare($sql4);
    $stmt->execute(['email'=>$enter_email,'username'=>$enter_user]);
    $post = $stmt->fetchAll();
    $bfound =NULL;
    foreach($post as $post)
    {
        
        $e_found = $post['email'];
        $n_found = $post['username'];
    }
    if ($enter_email == NULL && $enter_user == isset($n_found))
    {
        $bfound ="Found";
    }
    else if ($enter_email == isset($e_found) && $enter_user == NULL)
    {
        $bfound ="Found";

    }
    return ($bfound);
}
function new_password()
{
    // echo realpath(".././config/database.php");
    // echo realpath(".././config/connection.php");
    if(isset($_POST['change_submit']))
    {
        

        $email= NULL;
        $email=htmlspecialchars(strip_tags(trim($_POST['email1'])));
        $enter_pass1=htmlspecialchars(strip_tags(trim($_POST['pass1'])));
        $enter_pass2=htmlspecialchars(strip_tags(trim($_POST['pass2'])));

        $up = preg_match('@[A-Z]@',$enter_pass1);
        $lo = preg_match('@[a-z]@',$enter_pass1);
        $sp = preg_match('@[^\w]@',$enter_pass1);

        $email_check_results=changes_check_email($email);

        if ($email_check_results == 6)
        {
            return (6);
        }
        if ($enter_pass1 == NULL && $enter_pass2 == NULL && $email_check_results == NULL)
        {
            return; 
        }
        if($enter_pass1 != $enter_pass2)
        {
            echo ('Password are not identical');
            return (2);
        }
        else if (strlen($enter_pass1)<8)
        {
            echo ('<br>Password must be 8 characters(with no spaces) or greater'."<br>");
            return (3);
        }
        else if (preg_match('/\s/',$enter_pass1))
        {
            echo ("There are space in username". "<br>");
            return (4);
        }
        else if (!$up |!$lo|!$sp)
        {
            echo ("Weak password.Please make sure passsword has:"."<br>");
            echo ("> At least one uppercase"."<br>");
            echo ("> At least one lowercase"."<br>");
            echo ("> At least one special character"."<br>");
            return(5);
        }
        else if ($email_check_results == "found")
        {
            include ".././config/database.php";
            include_once ".././config/connection.php";

            $h_pass = password_hash($enter_pass1,PASSWORD_DEFAULT);
            $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
            $sql2 ='UPDATE table1 SET pass = :pass WHERE email = :email';
            $stmt1 = $pdo->prepare($sql2);
            $stmt1->execute(['pass'=>$h_pass,'email' => $email]);
            return(-1);
        }
        else if (($email_check_results == "found") && ($enter_pass1 == NULL))
        {
            echo "Please enter password  + re-enter field";
        }
    }
}
function changes_check_email($email)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";

    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $email_found = NULL;
    $sql9 = 'SELECT * FROM table1 WHERE email = ?';
    $stmt = $pdo->prepare($sql9);
    $stmt->execute([$email]);
    $post = $stmt->fetchAll();
    
    foreach($post as $post)
    {
        $email_found = $post['email'];
    }
    if ($email_found != $email)
    {
        echo "\nEmail is not found!Please check email is correct.";
        return (6);
    }
    if (($email_found == $email) && ($email != NULL))
    {
        echo "Email is found";
        return "found";
    }
}

function upload_images()
{
    // echo "upload_images working!";
    // echo realpath("./upload_images_copies");
    if (isset($_POST['image_submit']))
    {
        $upload_image = $_FILES['upload_image']['name'];
        $upload_tmp = $_FILES['upload_image']['tmp_name'];
        $extension = (pathinfo($upload_image,PATHINFO_EXTENSION));
        $rand_num = rand(0,100000);
        $upload_rename = 'Upload_'.date('Y_m_d_').$rand_num.'.'.$extension;
        
        $upload_location = "uploaded_save_img/$upload_rename";
        $result=image_validation($upload_rename,'upload_image',$upload_location);
        if ($result == -1)
        {
            if(move_uploaded_file($upload_tmp, "uploaded_save_img/$upload_rename"))
            {
                include ".././config/database.php";
                include_once ".././config/connection.php";
                
                $upload_image_name = pathinfo($upload_image);
                $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
                $sql3 = $pdo->prepare("INSERT INTO images (verf_code,name_img,pic_location) VALUES (:verf_code,:name_img,:pic_location)");
                $sql3->execute(['verf_code'=>$_SESSION['verf_no'],'name_img'=>$upload_image_name['filename'],'pic_location'=> $upload_location]);
                $upload_image= NULL;
                return(-1);
            }
            else
            {
                echo ("Issue with moving");
                return(2);
            }
        }
        return $result;

    }
}
function image_validation($upload_image,$upload_file,$upload_location)
{
    include "search_dup.php";

    if ($_FILES[$upload_file]['size'] > 10485760)
    {
        return (1);
    }
    if(!(pathinfo($upload_image,PATHINFO_EXTENSION) == 'jpg'|| pathinfo($upload_image,PATHINFO_EXTENSION) == 'png'|| pathinfo($upload_image,PATHINFO_EXTENSION) == 'bmp' || pathinfo($upload_image,PATHINFO_EXTENSION) == 'jpeg'))
    {
    return (2);
    }
    if (search_dup_images($upload_location) != NULL)
    {
        return (3);
    }
    else{
        return(-1);
    }
}
?>  