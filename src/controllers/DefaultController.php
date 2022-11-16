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
        $this->render('main-page');
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
}