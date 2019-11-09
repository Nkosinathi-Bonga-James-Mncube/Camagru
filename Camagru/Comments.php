<?php
session_start();
include "likes.php";
$pic_value = $_GET['p'];
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<nav>
        <ul>
        <li><a href="logout.php">Log-out</a></li>
        <li><a href="forgot.php">Change Password</a></li>
        <li><a href="email_change.php">Change Email</a></li>
        <li><a href="change_username.php">Change Username</a></li>
        <li><a href="upload.php">Upload images</a></li>
        <li><a href="grid.php">Gallery Edit page</a></li>
        <li><a href="main.php">Back to main</a></li>
        </ul>
</nav>

    <h1>Comments for <?php echo($pic_value)?></h1>
    
    <form action="" method="post">  
    Comments: <br><textarea rows = "10" cols = "70" name = "comment"> <?php echo(get_comments()."<br>")?></textarea> <br/>
    </form>
    <form action="" method="post">  
    Enter you comment here : <br><textarea rows = "5" cols = "70" name = "comment"> <?php echo(get_comments())?>"<br>"</textarea> <br/>
    <br>
    <input type = "submit" name = "Comment_section">
    <form action = "" method ="post">
    <button type = "submit" id = "button1" name = "button1"><?php echo(get_likes(). " likes from you")?></button>
    </form>

    </form>
    
</body>
</html>
<?php
if (isset($_POST['button1']))
{
    get_update();
}
if (isset($_POST['Comment_section']))
{
    get_insert();
    //get_comments();
}

    /*include "get_name.php";
    $comment = $_POST['comment'];
    $date = date("d-l-y");
    $time = date("h:ia");
    include "likes.php";
    echo get_likes();*/


    /*try{
        include "config/database.php";
        include "config/setup.php";
        $sql2 = "CREATE TABLE IF NOT EXISTS table3(
            userID INT NOT NULL AUTO_INCREMENT, pic_location VARCHAR(64),verf VARCHAR(64),PRIMARY KEY(userID)
            );";
        $pdo->exec($sql2);
        $pdo =  NULL;
    }
    catch(PDOException $e1)
    {
        echo $sql2 . "<br>" . $e1->getMessage();
        $pdo =  NULL;
    }*/ 

    /*try
    {
        include "config/setup.php";
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $sql3 = $pdo->prepare("INSERT INTO table1 (username,email,pass,verf,valid) VALUES (:username,:email,:pass,:verf,:valid)");
        $sql3->execute(['username'=>$enter_user,'email'=>$enter_email,'pass'=>$h_pass,'verf'=>$vkey,'valid'=>'0']);
        include "send_verf.php";

    }
    catch(PDOException $e2)
    {
        echo $sql2 . "<br>" . $e2->getMessage();
        $pdo =  NULL;
    }*/
    /*$name = get_name($_SESSION['verf_no']);
    $hold = fopen("comments.php", "a");
    fwrite($hold,"<b>".$name."($date)</b>:<br/>".$comment. "<br/>");
    fclose($hold);*/

?>