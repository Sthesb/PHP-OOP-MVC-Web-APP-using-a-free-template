<?php

    class Upload_file {
        private $table = "images";

        function upload($POST, $FILES){
            $DB = new Database();
            $_SESSION['error'] = "";
            
            $allowed[] = "image/jpeg";

            if(isset($POST['title']) && isset($POST['description']) && isset($FILES['image'])){ // checks if fields are not empty

                // upload file

                // validation the image 
                if($FILES['image']['name'] != "" && $FILES['image']['error'] == 0 && in_array($FILES['image']['type'], $allowed))
                {
                    $folder="uploads/";

                    // creting a folder to store the uploaded images 
                    if(!file_exists($folder)){
                        mkdir($folder, 0777, true);
                    }
                    
                    $destination = $folder . $FILES['image']['name'] ;
                    move_uploaded_file($FILES['image']['tmp_name'], $destination);

                }else{
                    $_SESSION['error'] = "This file could not be uploaded. "; 
                    header('Location: '.ROOT.'upload');
                }
                
                


                if(empty($_SESSION['error'])){

                    // save to db 
                    $arr [':title'] = $POST['title'];
                    $arr [':description'] = $POST['description'];
                    $arr [':url_address'] = $_SESSION['user_url'];
                    $arr [':image_path'] = $destination;
                    $arr [':date'] = date('Y-m-d H:i:s');
                    

                    $query = "INSERT INTO ".$this->table."(image_path, title, description, user_url_address, date ) 
                    VALUES (:image_path, :title, :description, :url_address,  :date)";
                    $data = $DB->write($query, $arr);

                    if($data){
                        // redirect  
                        header("Location:". ROOT );
                        die;

                    }
                }else{
                    header('Location: '.ROOT.'upload');
                }

                
            }
        }
    }