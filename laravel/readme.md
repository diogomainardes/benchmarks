# Benchmarks Laravel

Este repositório foi criado com o intuito de ser um centralizador para testes de performance do Laravel.

Fiquem a vontade em adicionar recursos para que possamos medir o desempenho em vários recursos.

Abaixo uma lista de rotas do projeto para realizar as analises:

- [Testar o desempenho entre Eloquent, QueryBuilder e PlainSQL](http://localhost/orm-builder-plainsql).  
## Configuração

Neste projeto já está disponível os migrations para a criação de uma tabela de clientes (fakes) e uma tabela de endereços (fakes) com relacionamento no cliente. A cada cliente tem 3 endereços, mas fique a vontade caso queira alterar estes números.

Para preparar o banco de dados, após atualizar o arquivo /config/database.php para apontar para o seu banco, abra a janela de comando e execute o seguinte comando:

- php artisan migrate --seed 

## Contato

Segue meu e-mail para trocarmos ideias a respeito de ferramentas de Profile, e alguns tipos de testes adicionais que sejam relevantes. O objetivo é conseguir o máximo de desempenho do framework Laravel.

- [diogomainardes@gmail.com](diogomainardes@gmail.com)