### Sistema de controle de estoque - Appmax

Seguindo as seguintes regras foi desenvolvido um sistema simples de controle de estoque.

O desafio consiste em desenvolver um sistema em laravel que possibilite gerenciar um estoque, com os seguintes requisitos: 

Um CRUD para os produtos com SKU para identificação.

Uma tela para adicionar produtos ao estoque.

Uma tela para dar baixa em produtos que serão enviados aos clientes.

O sistema deverá possuir uma API, disponível para fazer as movimentações do estoque com 2 endpoints:

* /api/baixar-produtos 
* /api/adicionar-produtos 

Um relatório de produtos movimentados por dia com: 

Quantos e quais produtos foram adicionados ao estoque.

Quantos e quais produtos foram removidos do estoque.

Se a adição/remoção foi feita via sistema ou via API.

Aviso de estoque baixo quando um produto possuir menos de 100 unidades no estoque. 

O sistema deverá estar protegido por um sistema de login.

Algumas validações precisam ser feitas tanto no sistema quanto pela API: 

Validação de quantidade de produtos: 

Não poderá remover produtos caso não possua a quantidade desejada. 

Não poderão ser cadastrados produtos com SKU duplicados (código para o produto). 

### Tecnologias
* PHP 7.4.4
* MySQL 10.4.11
* Laravel 7
* Bootstrap 4

#### Utilização

No diretório raiz do projeto, copie o arquivo .env.example e renomeie para apenas .env, dentro dele realize as configurações do seu banco de dados local, como o nome do banco, usuário, senha etc... o fluxo normal do Laravel.

Após isso, rode o composer para instalar as dependências.
```
composer install
```

Certifique-se de que você tem a base de dados que configurou no arquivo .env criada e então rode o comando de migrations:
```
php artisan migrate
```

Após isso o banco de dados deve estar populado com todas as tabelas do sistema.

Agora basta gerar a chave da aplicação e iniciar o servidor em desenvolvimento e utilizar o sistema:
```
php artisan key:generate
php artisan serve
```

Foram escritos poucos testes apenas exemplares, para rodar:
```
php artisan test
```

Agora ao acessar http://127.0.0.1:8000 deve exibir a tela inicial de login do sistema.

Como o sistema é protegido por login, deve-se então realizar o cadastro de usuário antes de continuar, clicando em **Cadastrar-se**.

Após cadastrar-se e realizar o login, será apresentada a tela de listagem de produtos, inicialmente não existirá nenhum produto, portanto deve-se adicionar algum clicando no botão **Adicionar produto**.

Após adicionar o produto, o mesmo será apresentado na listagem junto de suas informações, também estarão disponíveis algumas ações sobre esse produto, como edição, baixa e remoção.

No menu superior, ao clicar em **Relatório**, será levado para a tela onde é possivel visualizar os produtos adicionados/removidos do dia atual ou filtrar para algum outro dia. 

Também é exibido se a ação sobre o produto foi realizada via API ou sistema, junto de dois totalizadores de produtos adicionados e removidos. 

Também caso o produto esteja com o estoque abaixo de 100, é exibido um badge de estoque baixo.

### API
Como requisitado, também foram desenvolvidos 2 endpoints para utilização via API.

Adicionar produto
```
POST /api/product

REQUEST BODY 
{
	"sku": "123",
	"title": "Test",
	"description": "Test description",
	"quantity": 5,
	"price": "15.00"
}
```

Remover produto
```
DELETE /api/product/{id}
```
