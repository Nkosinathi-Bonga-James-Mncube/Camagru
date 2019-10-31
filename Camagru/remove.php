<?php
    function strip_info($temp)
    {
        
        $new = strip_tags($temp);
        //$new = htmlentities(htmlspecialchars(strip_tags($temp)));
    }
    return($new);
?>