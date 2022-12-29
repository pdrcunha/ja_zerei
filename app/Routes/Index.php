<?php
$routes->get('/', 'Home::index');

//Api-Login
$routes->post('login_auth','LoginApi::auth');
$routes->get('logout','LoginApi::logout');