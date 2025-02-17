# <img src="https://github.com/D1ng0ls/planejeme/blob/main/public/logo.png" alt="Logo OrganizeMe" width="48" style="vertical-align: bottom"/> PlanejeMe!

O PlanejeMe! é um sistema desenvolvido para otimizar a organização e gestão de tarefas, permitindo aos usuários cadastrar e acompanhar suas atividades com facilidade.

## Tecnologias Utilizadas
- **Front-End:** Bootrasp, HTML5, CSS3, JavaScript
- **Back-End:** PHP 8
- **Framework:** Laravel 11
- **Banco de Dados:** MySQL
- **APIs Utilizadas:** Google Calendar API (para integração com o Google Agenda)

## Funcionalidades Principais
- Cadastro e autenticação de usuários
- Gerenciamento de tarefas (adição, edição e remoção)
- Função de 'drag and drop' entre as tarefas
- Classificação por status (A Fazer, Em Andamento, Concluído)
- Definição de prazos para cada tarefa
- Integração com Google Calendar API
- Interface responsiva utilizando Bootstrap

## Rodando o Sistema Localmente
Para rodar o PlanejeMe! na sua máquina local, siga os passos abaixo:

### Requisitos
Antes de rodar o sistema, você precisa ter os seguintes softwares instalados:
- PHP (versão 8 ou superior)
- Composer (gerenciador de dependências PHP)
- MySQL

### Passo a passo
1. Clone o repositório Abra o terminal e clone o repositório:
```bash
git clone https://github.com/D1ng0ls/planejeme.git
cd planejeme
```
2. Instale as dependências Após clonar o repositório, instale as dependências com o Composer e NPM:
```bash
composer install
npm install
```
3. Configure o banco de dados Crie o banco de dados no MySQL com o nome desejado:
- Abra o MySQL:
```bash
mysql -u root -p
```
- Crie o banco de dados:
```sql
CREATE DATABASE kanban;
```
4. No arquivo `.env`, configure as informações do banco de dados:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kanban
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```
5. Execute as migrations Para criar as tabelas do banco de dados, rode as migrations:
```bash
php artisan migrate
```
6. Inicie o servidor local:
```bash
php artisan serve
```
7. Em outro terminal inicie também o servidor React
```bash
npm run dev
```
8. Acesse o sistema Abra o navegador e acesse a URL:
`http://127.0.0.1:8000/`
