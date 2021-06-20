<?php
    class Single_Post extends Controller{

        function index($id = ''){
            
            if($id == ''){
                $data ['paga_title'] = "Image not found ";
                $this->view("minima/index", $data);
            }else{
               $posts = $this->model("posts");
            
                $data['posts'] = $posts->getSinglePost($id);

                $data ['paga_title'] = "View Post";
                $this->view("minima/view_post", $data);
            } 
        }
            

    }