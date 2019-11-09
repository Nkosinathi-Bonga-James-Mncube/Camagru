<?php
    
    function get_name($value)
    {
        include "config/database.php";
        include_once "config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        //include "config/database.php";
        //include "config/setup.php";
        //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $sql11 = 'SELECT * FROM table1 WHERE verf = ?';
        $stmt = $pdo->prepare($sql11);
        $stmt->execute([$value]);
        $post = $stmt->fetchAll();
        foreach($post as $post)
        {
            $n_found = $post['username'];
            //$n_found = $post->username;
        }
        return ($n_found);
    }
?>