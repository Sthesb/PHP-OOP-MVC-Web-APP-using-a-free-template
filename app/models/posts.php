<?php 

    class Posts { 
        
        public $images_table = "images";
        public $users_table = "users";

        // All Posts
        function getAllPosts(){
            $DB = new Database();

            $query = "SELECT * FROM `".$this->images_table."` INNER JOIN ".$this->users_table." 
            ON ".$this->images_table.".user_url_address = ".$this->users_table.".url_address ORDER BY ".$this->images_table.".id DESC";
            
            $data = $DB->read($query);
            
            if(is_array($data)){
                return $data;
            }else{
                return false;
                header( 'Location: '.ROOT );
                
            }
        }

        // Single Post
        function getSinglePost($id){
            $DB = new Database();
            $arr [':id'] = $id;

            $query = "SELECT * FROM `".$this->images_table."` INNER JOIN ".$this->users_table." 
            ON ".$this->images_table.".user_url_address = ".$this->users_table.".url_address  
            WHERE ".$this->images_table.".id = :id LIMIT 1";
            
            $data = $DB->read($query, $arr);
            
            if(is_array($data)){
                return $data;
            }else{
                return false;
                header( 'Location: '.ROOT);
                
            }
        }
    }