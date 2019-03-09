<?php
   
include_once 'header.php';

    if(isset($action) AND isset($controller) ){
        include_once "../App/View/{$controller}/{$action}.php";
    }
    
include_once 'footer.php';

?>
  