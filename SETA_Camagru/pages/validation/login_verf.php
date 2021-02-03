<?php
// echo "<br>login_verf working";
// echo realpath(".././config/database.php")
function login($login_email,$login_pass)
{
    include ".././config/database.php";
    include_once ".././config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);

    $p_found =NULL;
    $login_user = htmlspecialchars(strip_tags(trim($_POST['login_email'])));
    $login_pass = htmlspecialchars(strip_tags(trim($_POST['login_pass'])));
    $sql7 = 'SELECT * FROM table1 WHERE email = ?';
    $stmt = $pdo->prepare($sql7);
    $stmt->execute([$login_user]);
    $post = $stmt->fetchAll();

    foreach($post as $post)
    {
        $p_found = $post['pass'];
        $is_valid = $post['valid'];
        $vkey = $post['verf'];
    }
    if (!$p_found)
    {
        echo("Email address is not found");
        return (1);
    }
    if (password_verify($login_pass,$p_found) && $p_found)
    {
        if ($is_valid == 1)
        {
            header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/home.php?vkey=$vkey");
        
        }
        else
        {
            echo ("Please check verification email");
            return(2);
        }
    }
    else if ($p_found)
    {
        echo ("Incorrect.Please check email and password");
        return(3);
    }
}
function user_verf()
{
    session_start();
    if(!isset($_SESSION['verf_no']))
    {
        include ".././config/database.php";
        include_once ".././config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $vkey = NULL;
        $vkey = $_GET['vkey'];
        $sql1 = 'SELECT * FROM table1 WHERE verf = ?';
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([$vkey]);
        $post = $stmt->fetchAll();
        foreach($post as $post){
            $vkey_check = $post['verf'];
            $_name_hold = $post['username'];
        }
        $_GET['vkey']='';
        $_SESSION['verf_no'] = $vkey_check;
    }
    if(!$_SESSION['verf_no'])
    {
        header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/login.php");
    }
    function get_name($value)
    {
        include ".././config/database.php";
        include_once ".././config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $sql11 = 'SELECT * FROM table1 WHERE verf = ?';
        $stmt = $pdo->prepare($sql11);
        $stmt->execute([$value]);
        $post = $stmt->fetchAll();
        foreach($post as $post)
        {
            $n_found = $post['username'];
        }
        return ($n_found);
    }
    $found_name=get_name($_SESSION['verf_no']);
    return($found_name);
}
function logout()
{
    session_start();
    session_unset();
    session_destroy(); 
}
function session_check()
{
    session_start();
    if (isset($_SESSION['verf_no']))
    {

        return $_SESSION['verf_no'];
    }

}
function search_user_forgot_pass()
{
        // echo realpath(".././config/database.php");
        // echo "search_user_forgot_pass() works!";
        // if (isset($_POST['forgot_submit']))
        // {
        //     echo $_POST['email_address'];
        // }
        if (isset($_POST['forgot_submit']))
        { 
            $email_enter = $_POST['email_address'];
            $email_found = NULL;
            include ".././config/database.php";
            include_once ".././config/connection.php";
            include "./email/send_email.php";
            $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        
            $sql8 = 'SELECT * FROM table1 WHERE email = ?';
            $stmt = $pdo->prepare($sql8);
            $stmt->execute([$email_enter]);
            $post = $stmt->fetchAll();
            foreach($post as $post)
            {
                $email_found = $post['email'];
                $vkey = $post['verf'];
                $username= $post['username'];
            }
            if (($email_enter == $email_found) && !(($email_enter == NULL) && ($email_found == NULL)))
            {
                $result=send_forgot_pass_mail($email_enter,$username,$vkey);
                echo ("Password reset email has been sent.Please check your inbox");
            }
            else
            {
                echo ("The email address doesnt exists");
                $result="not found";
            }
            return $result;
        }
}

?>