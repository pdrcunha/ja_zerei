# API REST COM AUTENTIFICAÇÃO EM PHP COM CODEIGNITER

## Resumo !

Ja zerei e uma api para salvar jogos em que os usuarios já zeraram.
De forma simples e possivel fazer todo o CRUD de:
Usuarios com autentificação;
Consoles;
E jogos já zerados;

## Porque ?

O intuito aqui era praticar meus conchecimentos com PHP, CI4, SQL e JWT. Deixando meu portifolio mais robusto :)

## Instalação do projeto, Config

Abra o arquivo C:\xampp\apache\conf\extra\httpd-vhosts.conf.bak em um editor ou bloco de notas e adicione o seguinte código no final do arquivo:
 ```
<VirtualHost *:80><br/>
   ServerAdmin webmaster@local.jazerei.com
   DocumentRoot "C:/xampp/htdocs/jazerei/public"
   ServerName local.jazerei.com<br/>
   ErrorLog "logs/local.jazerei.com-error.log"
   CustomLog "logs/local.jazerei.com-access.log" common
</VirtualHost>
 ```

Abra o arquivo C:\Windows\System32\drivers\etc\hosts em um editor ou bloco de notas e adicione o seguinte comando ao final do arquivo:
 ```127.0.0.1  		local.jazerei.com  ```

Com o xampp instalado e configurado em sua máquina, siga os seguintes passos:

Extraia a pasta do projeto jazerei em C:/xampp/htdocs/;
Inicie o Apache e MySQL em seu xampp;
Abra o navegador e acesse local.jazerei.com

## Instalação do banco

Antes de tudo, pare o xampp e, em seguida, remova o ponto e vírgula inicial (;) do seu xampp/php/php.ini no código a seguir: ;extension=intl, e então reinicie seu xampp.

Crie um novo banco de dados em seu SGBD
Abra o arquivo .env e altere as seguintes informações do seu banco de dados:
 ```
   database.default.hostname = localhost
   database.default.database = jazerei
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
 ```
## Importando tabelas com migrations e povando com seed

Execute o CMD na pasta principal do projeto e digite o comando php spark migrate, então a base de dados será criada;
Ainda com o CMD aberto, é preciso digitar o comando php spark db:seed NOME_DO_ARQUIVO para cada nome de arquivo .php existente na pasta app/database/Seeds;
Exemplo: php spark db:seed User
Obs: Não se deve adicionar a extensão .php em NOME_DO_ARQUIVO;
 ```
User padrão salvo na seed de usuarios.
LOGIN ->admin
SENHA ->admin
 ```

## Rotas
Index: Apresentação do CI $routes->get('/', 'Home::index',['filter' => 'auth']);

#### Jogos
 ```
$routes->post('/novojazerei', 'Jogos::novo_ja_zerei',['filter' => 'auth']);
$routes->get('/visualizarjazerei/(:num)', 'Jogos::visualizar_ja_zerei/$1',['filter' => 'auth']);
$routes->get('/visualizartodosjazerei', 'Jogos::visualizar_todos_ja_zerei',['filter' => 'auth']);
$routes->put('/editarjazerei/(:num)', 'Jogos::editar_ja_zerei/$1',['filter' => 'auth']);
$routes->delete('/deletarjazerei/(:num)', 'Jogos::deletar_ja_zerei/$1',['filter' => 'auth']);
 ```
#### Consoles
Povoar Banco com nomes
 ```
$routes->get('/povoarConsoles', 'Consoles::povoarBancoCrawler',['filter' => 'auth']);

$routes->post('/novoconsole', 'Consoles::novo_console',['filter' => 'auth']);
$routes->get('/visualizar_console/(:num)', 'Consoles::visualizar_console/$1',['filter' => 'auth']);
$routes->get('/visualizartodosconsoles', 'Consoles::visualizar_todos_console',['filter' => 'auth']);
$routes->put('/editarconsole/(:num)', 'Consoles::editar_console/$1',['filter' => 'auth']);
$routes->delete('/deletarconsole/(:num)', 'Consoles::deletar_console/$1',['filter' => 'auth']);
 ```
#### Usuarios
 ```
$routes->post('/novousuario', 'Usuarios::novo_usuario',['filter' => 'auth']);
$routes->delete('/deletarusuario/(:num)', 'Usuarios::delete_user/$1',['filter' => 'auth']);
$routes->post('/login', 'Usuarios::login');
 ```
