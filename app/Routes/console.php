<?php
//Povoar Banco com nomes
$routes->get('/povoarConsoles', 'Consoles::povoarBancoCrawler');

//CRUD
$routes->post('/novoconsole', 'Consoles::novo_console');
$routes->get('/visualizarconsole/{id}', 'Consoles::visualizar_console');
$routes->get('/visualizartodosconsoles/{id}', 'Consoles::visualizar_todos_console');
$routes->put('/editarconsole/{id}', 'Consoles::editar_console');
$routes->delete('/deletarconsole/{id}', 'Consoles::deletar_console');
