<?php session_start();
    
    function clearSession() {
        session_destroy();
    }

    //echo $_SESSION['token_id'];

?>