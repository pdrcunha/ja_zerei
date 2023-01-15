<?php

//CRUD
$routes->post('/novojazerei', 'Jogos::novo_ja_zerei');
$routes->get('/visualizarjazerei/(:num)', 'Jogos::visualizar_ja_zerei/$1');
$routes->get('/visualizartodosjazerei', 'Jogos::visualizar_todos_ja_zerei');
$routes->put('/editarjazerei/(:num)', 'Jogos::editar_ja_zerei/$1');
$routes->delete('/deletarjazerei/(:num)', 'Jogos::deletar_ja_zerei/$1');
