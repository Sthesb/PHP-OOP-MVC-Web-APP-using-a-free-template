<?php
    class About extends Controller{

        function index(){
            $data ['paga_title'] = "About";
            $this->view("minima/about-us", $data);
        }

        
    }