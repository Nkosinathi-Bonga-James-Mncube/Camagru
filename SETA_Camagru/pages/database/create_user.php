<?php

//ini_set('display_errors', 1); 
//ini_set('display_startup_errors', 1);
// echo error_reporting(E_ALL);

$enter_user = htmlspecialchars(strip_tags(trim($_POST['create_user'])));
$enter_email = htmlspecialchars(strip_tags(trim($_POST['create_email'])));
$enter_pass1 = htmlspecialchars(strip_tags(trim($_POST['create_pass1'])));
$bfound = NULL;
$h_pass = password_hash($enter_pass1,PASSWORD_DEFAULT);
$vkey = md5(time().$enter_user);

include_once "validation/search_dup.php";
include_once ".././config/database.php";
include_once ".././config/connection.php";

$result = search_dup($enter_email,$enter_user);
if ( $result == NULL)
{
    try
    {

        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $sql3 = $pdo->prepare("INSERT INTO table1(username,email,pass,verf,note,valid) VALUES (:username,:email,:pass,:verf,:note,:valid)");
        $sql3->execute(['username'=>$enter_user,'email'=>$enter_email,'pass'=>$h_pass,'verf'=>$vkey,'note'=>'0','valid'=>'0']);
        include '.././pages/email/send_email.php';
        $results_mail=send_verf_mail($enter_email,$enter_user,$vkey);
    }
    catch(PDOException $e2)
    {
        echo $sql2 . "<br>" . $e2->getMessage();
        $pdo =  NULL;
    }
}
// ?>

<script>
    var error_msg_value = '<?= $result?>'
    var redirect_result = '<?= $results_mail?>'
    if (redirect_result)
    {
        location.replace("../pages/login.php?validation=true");
    }
    if (error_msg_value == 'Found')
    {
        document.getElementById('error_msg7').className = "alert alert-danger alert px-2 py-1";
    }
</script>