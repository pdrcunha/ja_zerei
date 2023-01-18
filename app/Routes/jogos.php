<?php

//CRUD
$routes->post('/novojazerei', 'Jogos::novo_ja_zerei',['filter' => 'auth']);
$routes->get('/visualizarjazerei/(:num)', 'Jogos::visualizar_ja_zerei/$1',['filter' => 'auth']);
$routes->get('/visualizartodosjazerei', 'Jogos::visualizar_todos_ja_zerei',['filter' => 'auth']);
$routes->put('/editarjazerei/(:num)', 'Jogos::editar_ja_zerei/$1',['filter' => 'auth']);
$routes->delete('/deletarjazerei/(:num)', 'Jogos::deletar_ja_zerei/$1',['filter' => 'auth']);
