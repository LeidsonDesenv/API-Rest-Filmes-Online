# API-Rest-Filmes-Online

<p>Bom essa é minha primeira tentativa de fazer uma API por isso pode não está dentro de algumas normas, mas vou melhorando a cada projeto criado.</p>
<h3>Banco de dados</h3>

<p>Estou usando MySql e só precisei criar o banco de dados diretamente nele e configurar o nome do banco, usuário e senha no arquivo .env , as tabelas e registros eu fiz usando Seeders no Laravel que estão em \database\seeds. </p>

<h4>Tabelas</h4>

<p>Temos as 4 tabelas principais que são Categories, Directors, Movies e Series. Movies e Series recebem chave estrangeira de Categories e Directors para evitar redundância de dados e para facilitar na consulta entre e tabelas. </p>

<p>Cada tabela tem uma classe model com o mesmo nome e cada model tem um controller para gerenciar o CRUD. </p>

<p>Cada controller tem  métodos que busca todos registros, busca pelo id, busca por nome, cria um novo registro, atualiza um registro buscando o mesmo pelo id e deleta um registro buscando por id.
Os controllers Movie e Serie tem também os métodos que buscam por director e por category.</p>

<p>Para facilitar a etapa de teste todas as tabelas têm Seeders com seu respectivo nome bastando apenas fazer o migrate para gerar a tabela e depois o db:seed para incluir os registros nas tabelas.</p>

<h3>Autenticação </h3>

<p>Estou aprendendo a usar o Passport, mas por hora estou usando o auth normal, mas pretendo atualizar o projeto assim que entender como o Passport funciona.</p>