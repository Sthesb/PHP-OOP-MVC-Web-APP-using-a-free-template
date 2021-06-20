<?php
    class Upload extends Controller{

        function index(){
            $user = $this->model("User");
            if(!$result = $user->check_loggedIn()){
                // redirect  
                header("Location:". ROOT ."login");
                die;

            }
            
            if(isset($_POST['title']) && isset($_POST['description']) && isset($_FILES['image']))
            {
                unset($_SESSION['error']);
                $uploader = $this->model("upload_file");
                $uploader->upload($_POST, $_FILES);
            }
            

            
            $data ['paga_title'] = "Upload";
            $this->view("minima/upload", $data);
        }

        function image(){
            

            $data ['paga_title'] = "Upload";
            $this->view("minima/upload", $data);
        }

    }