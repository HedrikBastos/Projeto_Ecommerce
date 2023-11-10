CREATE DATABASE ecommerce;
USE ecommerce;

CREATE TABLE usuarios (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255),
  email VARCHAR(255),
  cpf VARCHAR(11),
  sobrenome VARCHAR(255),
  genero VARCHAR(50),
  PRIMARY KEY (id_usuario)
);

CREATE TABLE senhas_usuarios (
  id_usuario INT,
  senha VARCHAR(255),
  contra_senha VARCHAR(15),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

CREATE TABLE enderecos (
  id_endereco INT NOT NULL AUTO_INCREMENT,
  id_usuario INT,
  cep VARCHAR(8) NOT NULL,
  cidade VARCHAR(255),
  uf VARCHAR(2),
  rua VARCHAR(255),
  numero VARCHAR(10),
  complemento VARCHAR(255),
  bairro VARCHAR(255),
  telefone VARCHAR(15),
  PRIMARY KEY (id_endereco),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

CREATE TABLE produtos(
    id_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    categoria VARCHAR(255) NOT NULL,
    preco INT NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL    
    );
    
CREATE TABLE estoque (
    id_estoque INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY(id_produto) REFERENCES produtos(id_produto)
    );
CREATE TABLE pedidos (
  id_pedido INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  data DATE NOT NULL,
  status VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_pedido),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);
CREATE TABLE itens_pedido (
  id_item INT NOT NULL AUTO_INCREMENT,
  id_pedido INT NOT NULL,
  id_produto INT NOT NULL,
  quantidade INT NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id_item),
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
  FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

