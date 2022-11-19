<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path,PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('register','DefaultController');
Routing::get('register_check','SecurityController');
Routing::get('sign_in','DefaultController');
Routing::get('booking','DefaultController');
Routing::get('contact','DefaultController');
Routing::get('discount','DefaultController');
Routing::get('f40','DefaultController');
Routing::get('faq','DefaultController');
Routing::get('main_page','DefaultController');
Routing::get('our_cars','DefaultController');
Routing::get('porsche_tycan','DefaultController');
Routing::get('register_data_input','DefaultController');
Routing::get('register_data_input_check','SecurityController');
Routing::run($path);