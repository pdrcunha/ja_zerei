<?php
$routes->post('/novousuario', 'Usuarios::novo_usuario',['filter' => 'auth']);
$routes->delete('/deletarusuario/(:num)', 'Usuarios::delete_user/$1',['filter' => 'auth']);
$routes->post('/login', 'Usuarios::login');



