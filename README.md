Guia de Execução do Projeto Laravel
1. Mudança de Branch
Para garantir que você está na branch correta, execute:

bash
Copiar código
git checkout branch-entrega-teste
2. Instalação das Dependências
Após garantir que está na branch certa, instale as dependências do projeto para backend e frontend.

bash
Copiar código
# Backend - Composer
composer install

# Frontend - NPM
npm install
3. Configuração do Arquivo .env
O Laravel usa o arquivo .env para armazenar configurações sensíveis, como banco de dados e chaves secretas.

Linux/macOS:

bash
Copiar código
cp .env.example .env
Windows:

Renomeie o arquivo env.example para .env ou faça uma cópia com esse nome.
Gere a chave da aplicação:

bash
Copiar código
php artisan key:generate
4. Configuração do Banco de Dados
Crie um banco de dados PostgreSQL com o nome first_decision_teste.

Usuário: root
Senha: root
Edite o arquivo .env com as configurações de acesso ao banco de dados:

env
Copiar código
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=first_decision_teste
DB_USERNAME=root
DB_PASSWORD=root
Execute as Migrations e Seeders:

bash
Copiar código
php artisan migrate
php artisan db:seed
5. Executar Testes Unitários
Para validar a funcionalidade de registro de usuários, execute o seguinte teste unitário:

bash
Copiar código
php artisan test --filter=UserRegistrationTest
6. Subir o Projeto (Backend e Frontend)
Suba o servidor Laravel:

bash
Copiar código
php artisan serve
Compile e sirva os assets do frontend:

bash
Copiar código
npm run dev
7. Verificar Permissões da Pasta storage
O Laravel precisa de permissões corretas para criar arquivos na pasta storage. Em alguns casos, é necessário ajustar essas permissões para evitar erros.

bash
Copiar código
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache  # Linux/macOS
8. Checklist Final
Certifique-se de que:
O servidor Laravel e o frontend estão rodando corretamente.
O banco de dados está conectado e migrado.
As permissões da pasta storage estão corretas.
Os testes unitários foram executados sem falhas.
