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

function search_dup_new_name($enter_user)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";

    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql4 = 'SELECT * FROM table1 WHERE username = :username';
    $stmt = $pdo->prepare($sql4);
    $stmt->execute(['username'=>$enter_user]);
    $post = $stmt->fetchAll();
    $bfound =NULL;
    foreach($post as $post)
    {
        $n_found = $post['username'];
    }
    if ($enter_user == isset($n_found))
    {
        $bfound ="Found";
    }
    return ($bfound);
}
function new_username($username)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
 
    if(isset($_POST['change_submit']))
    {
        if (search_dup_new_name($username) == NULL)
        {
            $sql2 ='UPDATE table1 SET username = :username WHERE verf = :verf';
            $stmt1 = $pdo->prepare($sql2);
            $stmt1->execute(['verf'=>$_SESSION['verf_no'],'username' => $username]);
            echo ("Username is changed");
            return(7);
        }
        else
        {   
            echo "You are not a valid user.Plese change you own details";
            return('fail');
        }
    }

}
function new_password()
{
    if(isset($_POST['change_submit']))
    {
        
        $email= NULL;
        $username= NULL;
        $email=htmlspecialchars(strip_tags(trim($_POST['email1'])));
        $enter_pass1=htmlspecialchars(strip_tags(trim($_POST['pass1'])));
        $enter_pass2=htmlspecialchars(strip_tags(trim($_POST['pass2'])));
        $username=htmlspecialchars(strip_tags(trim($_POST['user1'])));

        $up = preg_match('@[A-Z]@',$enter_pass1);
        $lo = preg_match('@[a-z]@',$enter_pass1);
        $sp = preg_match('@[^\w]@',$enter_pass1);

        $email_check_results=changes_check_email($email);
        if ($username != NULL)
        {
            return new_username($username);
        }
        else
        if ($email_check_results == 6)
        {
            return (6);
        }
        if ($enter_pass1 == NULL && $enter_pass2 == NULL && $email_check_results == NULL && $username == NULL)
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
            echo ("There are space in password". "<br>");
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
                $sql3 = $pdo->prepare("INSERT INTO images (verf_code,name_img,re_name_img,pic_location) VALUES (:verf_code,:name_img,:re_name_img,:pic_location)");
                $sql3->execute(['verf_code'=>$_SESSION['verf_no'],'name_img'=>$upload_image_name['filename'],'re_name_img'=>$upload_rename,'pic_location'=> $upload_location]);
                $upload_image= NULL;
                // get_image_ID($upload_image_name['filename']);
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
function get_image_ID($img_name)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'SELECT * FROM images WHERE name_img = :name_img';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name_img'=>$img_name]);
    $post= $stmt->fetchAll();
    foreach ($post as $post)
    {
        $result = $post['imageID'];
    }
    $sql2 ='UPDATE comments SET imageID = :imageID WHERE name_img = :name_img';
    $stmt1 = $pdo->prepare($sql2);
    $stmt1->execute(['imageID'=>$result,'name_img' => $img_name]);
    return $result;

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
function comment_input()
{
    
    include ".././config/database.php";
    include_once ".././config/connection.php";
    
    if(isset($_POST['comment_submit']))
    {
        $result=$_POST['text_value'];
        if ($result != NULL)
        {
            insert_comment($result);
            exit(header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/image_details.php?i={$_GET['i']}"));
        }
    }

    $image = $_GET['i'];
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql5 = 'SELECT * FROM comments WHERE flag = :flag AND name_img = :name_img ORDER BY created DESC';
    $stmt = $pdo->prepare($sql5);
    $stmt->execute(['flag'=>'1' , 'name_img'=>$_GET['i']]);
    $post= $stmt->fetchAll();
    foreach($post as $post)
    {
        $name = get_name($post['verf_no']);
        echo '
                <div class="p-2 bd-highlight">
                <u>'.$name.'</u><br><br>
                <img width=50px height="50px" style="border-radius: 25px;" src="../static/test1.jpg">
                <div class="user-comment-post">'.$post['comments'].'</div>
                <p style="font-size: 15px;">Posted on :'.$post['created'].' </p>
                <p id="date_output" style="font-size: 15px;"></p>
                <div id="user-comment-buttons">
                <form method="POST">';
        if ( $post['verf_no']== $_SESSION['verf_no'])
        {echo'
                <button type="submit" id=' . $post['commentID'] . ' class="btn btn-outline-danger form-group" name="comment_delete" onclick="'.get_delete($post['commentID']).'">Delete post</button><br><br>
                </form>
                </div>
                <hr style="background-color: white;">';}
    }
}

function insert_comment($result)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";

    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $msg = $result;
    $sql3 = $pdo->prepare("INSERT INTO comments(comments,name_img,flag,verf_no) VALUES (:comments,:name_img,:flag,:verf_no) ") ;
    $sql3->execute(['comments'=>$msg,'flag'=>'1','name_img'=>$_GET['i'],'verf_no'=>$_SESSION['verf_no']]);
}
function get_delete($value)
{

    if(isset($_POST['comment_delete']))
    {
        include ".././config/database.php";
        include_once ".././config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $sql = 'DELETE FROM comments WHERE commentID = :commentID AND verf_no = :verf_no';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['commentID'=>$value, 'verf_no'=>$_SESSION['verf_no']]);
        exit(header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/image_details.php?i={$_GET['i']}"));   
    }
}

?>  