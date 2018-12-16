<?php include "session.php";
        
        function get_token_id() {

                if(isset($_SESSION['token_id'])) { 
                        return $_SESSION['token_id'];
                } else {
                        return createToken();
                }
        }

        function check_valid($method) {
                
                if($method == 'post' || $method == 'get') {
                        $post = $_POST;
                        $get = $_GET;
                        //if(isset(${$method}[$this->get_token_id()]) && (${$method}[$this->get_token_id()] == $this->get_token())) {
                        if(isset(${$method}['random']) && (${$method}['random'] == $_SESSION['token_id'])) {
                                        return true;
                                } else {
                                        return false;   
                                }
                        } else {
                                return false;   
                        }
        }

        function csrf_field() {
                echo '<input type="hidden" value="'.get_token_id().'" name="random">';
        }

        function dropToken() {
                clearSession();    
        }

        function createToken() {
                $token_id = rand(1,50);
                $_SESSION['token_id'] = $token_id;
                return $token_id;
        }    
?>