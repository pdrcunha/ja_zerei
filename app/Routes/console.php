<?php
//Povoar Banco com nomes
$routes->get('/povoarConsoles', 'Consoles::povoarBancoCrawler',['filter' => 'auth']);

//CRUD
$routes->post('/novoconsole', 'Consoles::novo_console',['filter' => 'auth']);
$routes->get('/visualizar_console/(:num)', 'Consoles::visualizar_console/$1',['filter' => 'auth']);
$routes->get('/visualizartodosconsoles', 'Consoles::visualizar_todos_console',['filter' => 'auth']);
$routes->put('/editarconsole/(:num)', 'Consoles::editar_console/$1',['filter' => 'auth']);
$routes->delete('/deletarconsole/(:num)', 'Consoles::deletar_console/$1',['filter' => 'auth']);
