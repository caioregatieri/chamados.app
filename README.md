# Sistema de controle de chamados técnicos.

### Desenvolvido por Caio Regatieri.

#### Usando laravel, bootstrap e Mysql.

#### Passos para execução:

- git clone https://github.com/caioregatieri/chamados.app.git
- cd chamados.app
- cp .env.example .env
- #criar um novo banco de dados
- #editar as configurações de conexao com o banco no arquivo .env
- php composer install
- php artisan key:generate
- php artisan migrate --seed
- php artisan serve