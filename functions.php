<?php 

function text_input($data) {

    $data = trim($data);
    $data = htmlspecialchars($data,ENT_COMPAT, 'ISO-8859-1');
    return $data;
    
}

?>