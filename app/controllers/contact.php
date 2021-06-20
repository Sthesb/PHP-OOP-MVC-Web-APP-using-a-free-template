<?php
    class Contact extends Controller{

        function index(){
            $data ['paga_title'] = "Contact Us";
            $this->view("minima/contact", $data);
        }

        
    }