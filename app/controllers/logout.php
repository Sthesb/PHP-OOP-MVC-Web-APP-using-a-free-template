<?php
    class Logout extends Controller{
        function index(){
            unset($_SESSION['username']);
            unset($_SESSION['user_id']);
            unset($_SESSION['user_url']);

            header( 'Location: '.ROOT );
        }
    }