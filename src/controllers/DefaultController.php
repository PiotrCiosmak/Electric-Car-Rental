<?php

require_once 'AppController.php';

class DefaultController extends AppController
{
    public function index()
    {
        $this->render('register');
    }
    
    public function register()
    {
        $this->render('register');
    }

    public function register_check()
    {
        $this->render('register_check');
    }

    public function sign_in()
    {
        $this->render('sign_in');
    }

    public function booking()
    {
        $this->render('booking');
    }
    
    public function contact()
    {
        $this->render('contact');
    }

    public function discount()
    {
        $this->render('discount');
    }

    public function f40()
    {
        $this->render('f40');
    }

    public function faq()
    {
        $this->render('faq');
    }

    public function main_page()
    {
        $this->render('main_page');
    }

    public function our_cars()
    {
        $this->render('our_cars');
    }

    public function porsche_tycan()
    {
        $this->render('porsche_tycan');
    }

    public function register_data_input()
    {
        $this->render('register_data_input');
    }

    public function register_data_input_check()
    {
        $this->render('register_data_input_check');
    }

    public function sign_in_check()
    {
        $this->render('sign_in_check');
    }

    public function booking_check()
    {
        $this->render('booking_check');
    }

    public function delete_cookie()
    {
        $this->render('delete_cookie');
    }

    public function register_data_cookie()
    {
        $this->render('register_data_cookie');
    }
}