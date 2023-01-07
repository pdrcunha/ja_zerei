<?php

//CRUD
$routes->post('/novoconsole', 'Jogos::novo_ja_zerei');
$routes->get('/visualizarconsole/{id}', 'Jogos::visualizar_ja_zerei');
$routes->get('/visualizartodosJogos/{id}', 'Jogos::visualizar_todos_ja_zerei');
$routes->put('/editarconsole/{id}', 'Jogos::editar_ja_zerei');
$routes->delete('/deletarconsole/{id}', 'Jogos::deletar_ja_zerei');
