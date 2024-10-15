# first-decision-teste

comandos para execução do projeto:

#muda de branch
git checkout branch-entrega-teste

composer install
npm install


#certifique-se de que o arquivo .env esteja na raiz do projeto
linux e mac execute o comando cp .env.example .env no windows mude o nome do example ou faça uma copia para .env
php artisan key:generate


dados do migration 

#com as credenciais do banco de dados registradas no .env configuradas rodar os comandos abaixo.
crie em um banco na sua máquina postgres com o nome "first_decision_teste" com o usuário e senha "root" depois configure seu .env na aplicação para apontar para o banco criado

php artisan migrate
php artisan db:seed


#teste unitário
php artisan test --filter=UserRegistrationTest


para subir o projeto precisa rodar os comandos do front e do back
php artisan serve
npm run dev


alguns comandos a serem verificados
#verifique as permissões da pasta storage do framework, algumas vezes ele não deixa criar os arquivos que pode gerar erro

