# Impacta-Almoxarifado
Projeto de Almoxarifado

Script DDL DATABASE.

-- Database: almoxarifado

-- DROP DATABASE IF EXISTS almoxarifado;

CREATE DATABASE almoxarifado
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

-- SCHEMA: wax

-- DROP SCHEMA IF EXISTS wax ;

CREATE SCHEMA IF NOT EXISTS wax
    AUTHORIZATION postgres;

-- Table: wax.tbusuario

-- DROP TABLE IF EXISTS wax.tbusuario;

CREATE TABLE IF NOT EXISTS wax.tbusuario
(
    usuid smallint NOT NULL DEFAULT nextval('wax.tbusuario_usuid_seq'::regclass),
    usunome character varying(100) COLLATE pg_catalog."default" NOT NULL,
    usucpfcnpj character varying(18) COLLATE pg_catalog."default",
    usutelefone character varying(20) COLLATE pg_catalog."default",
    usucodigopermisao integer NOT NULL,
    usudescricaopermisao character varying(20) COLLATE pg_catalog."default" NOT NULL,
    ususenha character varying(10) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT tbusuario_pkey PRIMARY KEY (usuid)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS wax.tbusuario
    OWNER to postgres;
    
CREATE TABLE IF NOT EXISTS wax.tbproduto
(
    proid integer NOT NULL DEFAULT nextval('wax.tbproduto_proid_seq'::regclass),
    forid integer,
    pronome character varying(100) COLLATE pg_catalog."default" NOT NULL,
    procodigo character varying(5) COLLATE pg_catalog."default" NOT NULL,
    provalor numeric(12,2) NOT NULL,
    provalidade date,
    proquantidade bigint NOT NULL,
    CONSTRAINT tbproduto_pkey PRIMARY KEY (proid),
    CONSTRAINT tbproduto_forid_fkey FOREIGN KEY (forid)
        REFERENCES wax.tbfornecedor (forid) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS wax.tbproduto
    OWNER to postgres;
    
CREATE TABLE IF NOT EXISTS wax.tbfornecedor
(
    forid integer NOT NULL DEFAULT nextval('wax.tbfornecedor_forid_seq'::regclass),
    fornome character varying(40) COLLATE pg_catalog."default" NOT NULL,
    forcpfcnpj character varying(18) COLLATE pg_catalog."default" NOT NULL,
    foremail character varying(25) COLLATE pg_catalog."default" NOT NULL,
    fortelefone character varying(20) COLLATE pg_catalog."default" NOT NULL,
    forendereco character varying(40) COLLATE pg_catalog."default" NOT NULL,
    foruf character varying(2) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT tbfornecedor_pkey PRIMARY KEY (forid)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS wax.tbfornecedor
    OWNER to postgres;

TABLESPACE pg_default;

ALTER TABLE IF EXISTS wax.tbobservacao
    OWNER to postgres;
    
//valor para inserir no bd
INSERT INTO wax.tbusuario(
	usunome, usucpfcnpj, usutelefone, usucodigopermisao, usudescricaopermisao, ususenha)
	VALUES ('joao', '123', '123', 1, 'Alto nivel', '123');
    
INSERT INTO wax.tbfornecedor(
	fornome, forcpfcnpj, foremail, fortelefone, forendereco, foruf)
	VALUES ('Fonecedor 1', '123', 'email@email', '123', 'rua brasil?', 'sp');
   
INSERT INTO wax.tbproduto(
	forid, pronome, procodigo, provalor, provalidade, proquantidade)
	VALUES (1, 'cell', '123', 1200.00, '02/02/2023', 3);
   
