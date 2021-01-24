<script>
    document.getElementById('error_msg1').className = "d-none alert alert-danger alert px-2 py-1";
</script>
<?php 
include "error_input_check.php";
if (isset($_POST['create_button']))
{
    $enter_user = NULL;
    $enter_email = NULL;
    $enter_pass1 = NULL;
    $enter_pass2= NULL;

    $enter_user = htmlspecialchars(strip_tags(trim($_POST['create_user'])));
    $enter_email = htmlspecialchars(strip_tags(trim($_POST['create_email'])));
    $enter_pass1 = htmlspecialchars(strip_tags(trim($_POST['create_pass1'])));
    $enter_pass2 = htmlspecialchars(strip_tags(trim($_POST['create_pass2'])));
    $value1=error_check_input($enter_user,$enter_email,$enter_pass1,$enter_pass2);
    if($value1 == -1)
    {
        include "./database/create_user.php";
    }
}
?>


