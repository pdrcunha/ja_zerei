<?php
$routes->get('/', 'Home::index');
$routes->get('/povoarConsoles', 'Consoles::povoarBancoCrawler');

