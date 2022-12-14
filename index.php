<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('register_check', 'SecurityController');
Routing::get('sign_in', 'DefaultController');
Routing::get('sign_in_check', 'SecurityController');
Routing::get('booking', 'DefaultController');
Routing::get('contact', 'DefaultController');
Routing::get('discount', 'DefaultController');
Routing::get('f40', 'DefaultController');
Routing::get('faq', 'DefaultController');
Routing::get('main_page', 'DefaultController');
Routing::get('our_cars', 'DefaultController');
Routing::get('porsche_taycan', 'DefaultController');
Routing::get('register_data_input', 'DefaultController');
Routing::get('register_data_input_check', 'SecurityController');
Routing::get('booking_check', 'SecurityController');
Routing::get('delete_cookie', 'CookieController');
Routing::get('register_data_cookie', 'DefaultController');
Routing::get('account', 'DefaultController');
Routing::get('update_user_data', 'DefaultController');
Routing::get('update_user_data_check', 'SecurityController');
Routing::get('change_password_check', 'SecurityController');
Routing::get('admin_panel', 'DefaultController');
Routing::get('admin_panel_check', 'SecurityController');
Routing::get('change_car_price', 'SecurityController');
Routing::post('search', 'CarController');
Routing::post('add_new_car', 'CarController');
Routing::post('fiat_500', 'DefaultController');
Routing::post('bmw_i3', 'DefaultController');
Routing::post('audi_rs_e_tron_gt', 'DefaultController');
Routing::post('kia_niro', 'DefaultController');
Routing::post('mazda_mx_30', 'DefaultController');
Routing::post('nissan_leaf', 'DefaultController');
Routing::post('renault_zoe', 'DefaultController');
Routing::post('skoda_enyaq', 'DefaultController');
Routing::post('tesla_model_s', 'DefaultController');
Routing::post('tesla_model_x', 'DefaultController');
Routing::post('tesla_model_y', 'DefaultController');
Routing::post('volkswagen_id_5', 'DefaultController');
Routing::post('volkswagen_id_buzz', 'DefaultController');
Routing::run($path);