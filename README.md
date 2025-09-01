## Sobre o Projeto

- O sistema permite a criação, atendimento e exclusão de chamados.
- Cada chamado deve receber um título, descrição e categoria a qual pertence.
- Ao ser criado cada chamado já recebe a data de criação, data de resolução, prazo de solução e inicia com "situação" novo.
- O prazo de solução é três dias após a data de criação.
- Na página inicial é mostrado qual a procentagem de chamados resolvidos dentro do prazo no mês.

## Relacionamentos

- Relação N:1 de categoria para chamado.
- Relação N:1 de situação para chamado.

## Ferramentas utilizadas

- PHP com Laravel.
- SQLITE como banco de dados.
- Blade para as views.
