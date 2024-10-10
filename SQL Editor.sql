CREATE DATABASE db_vendas;
USE db_vendas;

CREATE TABLE Produto (
    Codigo_Produto INT PRIMARY KEY,
    Descricao_Produto VARCHAR(30),
    Preco_Produto FLOAT
);
CREATE TABLE Nota_fiscal (
    Numero_NF INT PRIMARY KEY,
    Data_NF DATE,
    Valor_NF FLOAT
);
CREATE TABLE Itens (
    Produto_Codigo_Produto INT,
    Nota_fiscal_Numero_NF INT,
    Num_Item INT,
    Qtde_Item INT,
    PRIMARY KEY (Num_Item),
    FOREIGN KEY (Produto_Codigo_Produto) REFERENCES Produto(Codigo_Produto),
    FOREIGN KEY (Nota_fiscal_Numero_NF) REFERENCES Nota_fiscal(Numero_NF)
);

ALTER TABLE Produto 
MODIFY Descricao_Produto VARCHAR(50);

ALTER TABLE Nota_fiscal 
ADD ICMS FLOAT AFTER Numero_NF;

ALTER TABLE Produto 
ADD Peso FLOAT;

ALTER TABLE Itens 
DROP PRIMARY KEY,
ADD PRIMARY KEY (Num_Item);

DESCRIBE Produto;

DESCRIBE Nota_fiscal;

ALTER TABLE Nota_fiscal 
CHANGE Valor_NF ValorTotal_NF FLOAT;

ALTER TABLE Nota_fiscal 
DROP COLUMN Data_NF;

DROP TABLE Itens;

ALTER TABLE Nota_fiscal 
RENAME TO Venda;

