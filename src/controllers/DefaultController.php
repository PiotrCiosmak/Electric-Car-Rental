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

    public function porsche_taycan()
    {
        $this->render('porsche_taycan');
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

    public function account()
    {
        $this->render('account');
    }

    public function update_user_data()
    {
        $this->render('update_user_data');
    }

    public function update_user_data_check()
    {
        $this->render('update_user_data_check');
    }

    public function change_password_check()
    {
        $this->render('change_password_check');
    }

    public function admin_panel()
    {
        $this->render('admin_panel');
    }

    public function admin_panel_check()
    {
        $this->render('admin_panel_check');
    }

    public function change_car_price()
    {
        $this->render('change_car_price');
    }

    public function fiat_500()
    {
        $this->render('fiat_500');
    }

    public function audi_rs_e_tron_gt()
    {
        $this->render('audi_rs_e_tron_gt');
    }

    public function bmw_i3()
    {
        $this->render('bmw_i3');
    }

    public function kia_niro()
    {
        $this->render('kia_niro');
    }

    public function mazda_mx_30()
    {
        $this->render('mazda_mx_30');
    }

    public function nissan_leaf()
    {
        $this->render('nissan_leaf');
    }

    public function renault_zoe()
    {
        $this->render('renault_zoe');
    }

    public function skoda_enyaq()
    {
        $this->render('skoda_enyaq');
    }

    public function tesla_model_s()
    {
        $this->render('tesla_model_s');
    }

    public function tesla_model_x()
    {
        $this->render('tesla_model_x');
    }

    public function tesla_model_y()
    {
        $this->render('tesla_model_y');
    }

    public function volkswagen_id_5()
    {
        $this->render('volkswagen_id_5');
    }

    public function volkswagen_id_buzz()
    {
        $this->render('volkswagen_id_buzz');
    }
}