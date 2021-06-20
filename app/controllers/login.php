<?php
    class Login extends Controller{

        function index(){

            $data ['paga_title'] = "Login";

            if(!empty($_POST['email'])){ 
                $user = $this->model("User");
                $user->signup($_POST); // signup function
            }
            else if(!empty($_POST['username']) && empty($_POST['email'])){
                
                $user = $this->model("User");
                $user->login($_POST);
                

                
            }
            

            $this->view("minima/login", $data);
        }
    }