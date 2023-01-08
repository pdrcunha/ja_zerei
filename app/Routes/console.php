<?php
//Povoar Banco com nomes
$routes->get('/povoarConsoles', 'Consoles::povoarBancoCrawler');

//CRUD
$routes->post('/novoconsole', 'Consoles::novo_console');
$routes->get('/visualizar_console/(:num)', 'Consoles::visualizar_console/$1');
$routes->get('/visualizartodosconsoles', 'Consoles::visualizar_todos_console');
$routes->put('/editarconsole/(:num)', 'Consoles::editar_console/$1');
$routes->delete('/deletarconsole/(:num)', 'Consoles::deletar_console/$1');
