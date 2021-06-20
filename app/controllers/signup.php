<?php
    class Signup extends Controller{

        function index(){
            
            $db = new Database();
            $query = "select * from users ";
            // $data = [':id' => 2];
            $users['results'] = $db->read($query);
            $data ['paga_title'] = "Sign Up";
            
            $this->view("minima/signup", $data);
        }

    }