<?php

    class User{
        // global variables
        private $table = "users";
        // public $DB = new Database();
    


        function login($POST){
            $DB = new Database();
            $_SESSION['error'] = "";

            if(!empty($POST['username']) && !empty($POST['password'])){ // checks if fields are not empty

                $arr [':username'] = $POST['username'];
                $arr [':password'] = $POST['password'];
                // echo  $arr [':password'];


                $query = "SELECT * FROM ".$this->table." WHERE username = :username and password = :password limit 1 ";
                $data = $DB->read($query, $arr);
                
                if(!empty($data)){
                    // logged in 
                    // print_r($data);
                    $_SESSION['user_id'] = $data[0]->Id;
                    $_SESSION['username'] = $data[0]->username;
                    $_SESSION['user_url'] = $data[0]->url_address;

                    
                    header( 'Location: '.ROOT );
                }else{
                    // $_SESSION['error'] = "Incorrect Username or Password ";
                    // // var_dump($error[1]['error']);
                    // // exit();

                    // header( 'Location: ' . ROOT . 'login');
                    
                    return $data;
                }
            }
            
            
        }

        function signup($POST){
            $DB = new Database();
            $_SESSION['error'] = "";

            if(!empty($POST['username']) && !empty($POST['password']) && !empty($POST['email'])){ // checks if fields are not empty

                $arr [':username'] = $POST['username'];
                $arr [':email'] = $POST['email'];
                $arr [':url_address'] = get_random_string_max(60);
                $arr [':password'] = $POST['password'];

                $query = "INSERT INTO ".$this->table."(username, email, url_address, password ) 
                VALUES (:username, :email, :url_address, :password)";
                $data = $DB->write($query, $arr);
                
                if($data){
                    // redirect  
                    header("Location:". ROOT ."login");
                    die;

                }else{
                    $_SESSION['error'] = "Username already exist ";

                    header('Location : ' . ROOT .'login', $_SESSION['error']);
                    
                }
            }else{
                $_SESSION['error'] = "Username and Password are empty ";
            }
        }

        function check_loggedIn(){
            $DB = new Database();
            if(isset($_SESSION['user_url'])){

                $arr ['user_url'] = $_SESSION['user_url'];

                $query = "SELECT * FROM ".$this->table." WHERE url_address = :user_url limit 1";
                $data = $DB->read($query, $arr);

                if(is_array($data)){
                    // logged in 
                    $_SESSION['user_id'] = $data[0]->Id;
                    $_SESSION['username'] = $data[0]->username;
                    $_SESSION['user_url'] = $data[0]->url_address;

                    return true;
                }
            }

            return false;
        }
    }