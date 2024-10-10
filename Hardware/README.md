## Pré-requisitos

-   PHP >= 7.4
-   MySQL
-   Laravel Jetstream
-   xampp

1. **Instalar Dependências**:

-   Execute o seguinte comando para instalar as dependências necessárias: `composer install`

2. **Banco de Dados**:

-   A estrutura do banco de dados está disponível no arquivo `database/dump/db_inovcorp_products.sql` na pasta database. Certifique-se de importar essa estrutura antes de iniciar o aplicativo.

3. **Configuração do Ambiente**:

-   Crie um arquivo chamado `.env` na raiz do projeto.
-   Para ajudá-lo a configurar seu arquivo `.env`, você pode consultar o exemplo fornecido em `env.example.php`.
-   Certifique-se de que o arquivo `.env` esteja configurado corretamente com suas credenciais do banco de dados e smtp.

## Project

-   Este site é um ambiente de teste

-   Criação de Produtos de Hardware: Este sistema permite o desenvolvimento, configuração e gestão de projetos de hardware. A plataforma é focada em otimizar a criação e monitoramento de produtos físicos, integrando processos de design e prototipagem.

-   Criptografia de Dados: Para garantir a segurança e a privacidade de informações sensíveis, como endereços de email e senhas, este sistema utiliza técnicas de criptografia de ponta, protegendo todos os dados armazenados e transmitidos.

-   Autenticação com 2FA (Two-Factor Authentication): Visando fortalecer ainda mais a segurança de acesso, o site suporta a autenticação em dois fatores (2FA). Esse método exige uma segunda forma de verificação, além da senha, para garantir que somente usuários autorizados possam acessar suas contas

## Instruter

-   Execute o seguinte comando para instalar as migrate necessárias: `php artisan migrate` verifique se o banco de dados foi criado e se a tabela foi criada. utilize o diretorio `database\dump` para auxiliar caso precise de ajuda.

-   para rondar o projeto front-end utilize o comando composer start ou php artsian serve, não esqueça de vereficar se o comando será executado na pasta principal do projeto.

-   Apos startar a aplicação, acesse em http://localhost:8000/register para se cadastrar

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## commados

composer install
php artisan migrate
php artisan route:clear
php artisan route:cache
php artisan config:clear
php artisan view:clear
php artisan key:generate
php artisan config:cache
php artisan migrate
composer start
