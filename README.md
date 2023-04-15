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
