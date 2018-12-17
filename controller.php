<?php include "csrf.php";

    //if(isset($_POST['submit'])) {
        
        if(check_valid("post")) {
        
            echo $_POST['email'] . " " . $_POST['pswrd'];

            $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
            
            fwrite($myfile, $_POST['email']."  ". $_SESSION['token_id'] ."\n");
            
            fclose($myfile);

            header("Location:form");
        
        } else {

            $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
            
            fwrite($myfile, " Someone tried csrf\n");
            
            fclose($myfile);

            header('Location:error_pages/401');
        }
    // } else {
    //     echo "<h1>Bad Request</h1>";
    // }
?>