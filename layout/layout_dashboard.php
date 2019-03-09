<?php
   
include_once 'header_dashboard.php';

    if(isset($action) AND isset($controller) ){        
        include_once "../App/View/{$controller}/{$action}.php";
    }
    
include_once 'footer_dashboard.php';

?>
 