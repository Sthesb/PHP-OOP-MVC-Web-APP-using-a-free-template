<?php
    class Home extends Controller{

        function index(){
            $data ['paga_title'] = "Home Page";
            
            $posts = $this->model("Posts");
            $image_class = $this->model("image_class");
            
            $data['posts'] = $posts->getAllPosts();

            if(is_array($data['posts'])){
                foreach($data['posts'] as $key => $value){
                    $data['posts'][$key]->image_path = $image_class->get_thumbnail($data['posts'][$key]->image_path);
                }
            }

            $this->view("minima/index", $data);
        }

    }