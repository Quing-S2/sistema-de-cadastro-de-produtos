Sistema de Cadastro de Produtos (PHP)

Trabalho prático desenvolvido para a disciplina Programação Web.

Este sistema consiste em uma aplicação simples para gerenciamento de produtos, permitindo cadastrar, listar, editar e excluir itens.  
Foi construído utilizando PHP, MySQL, JavaScript e CSS puro, respeitando todas as restrições do projeto.

---

Funcionalidades

- Cadastro de novos produtos  
- Listagem de todos os produtos registrados  
- Edição de produtos existentes  
- Exclusão com confirmação em JavaScript  
- Interface limpa desenvolvida com CSS puro

Cada produto possui:
- Nome  
- Descrição  
- Preço  
- Categoria  

---

Tecnologias utilizadas

- PHP 8+ - Backend e lógica principal  
- MySQL - Armazenamento dos dados  
- HTML5 & CSS3 - Estrutura e estilização da interface  
- JavaScript - Confirmação de exclusão  

---

Como executar o projeto

1. Instale e abra o XAMPP (ou WAMP/Laragon).
2. Copie os arquivos deste repositório para a pasta:
C:\xampp\htdocs\sistema-de-cadastro-de-produtos
3. No phpMyAdmin, execute o script SQL abaixo para criar o banco e a tabela.
4. Abra o arquivo db.php e ajuste usuário/senha do MySQL se necessário.
5. Inicie o Apache + MySQL e acesse no navegador:
http://localhost/sistema-de-cadastro-de-produtos/index.php


---

Script do Banco de Dados (MySQL)

CREATE DATABASE loja;
USE loja;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    categoria VARCHAR(50),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

---

Autor

Thiago Henrique Porfirio de Oliveira (43672973)
Lorenzo Cavalcante Carvalho Mendes Pereira (44988982)

