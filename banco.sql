-- Database: projeto

-- DROP DATABASE IF EXISTS projeto;

CREATE DATABASE projeto
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    LOCALE_PROVIDER = 'libc'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

-- Table: public.categoria

-- DROP TABLE IF EXISTS public.categoria;

CREATE TABLE IF NOT EXISTS public.categoria
(
    id_categoria integer NOT NULL DEFAULT nextval('categoria_id_categoria_seq'::regclass),
    nome character varying COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT categoria_pkey PRIMARY KEY (id_categoria)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.categoria
    OWNER to postgres;

-- Table: public.classificacao

-- DROP TABLE IF EXISTS public.classificacao;

CREATE TABLE IF NOT EXISTS public.classificacao
(
    id_classificacao integer NOT NULL DEFAULT nextval('classificacao_id_classificacao_seq'::regclass),
    nome character varying COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT classificacao_pkey PRIMARY KEY (id_classificacao)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.classificacao
    OWNER to postgres;

-- Table: public.filme

-- DROP TABLE IF EXISTS public.filme;

CREATE TABLE IF NOT EXISTS public.filme
(
    id_filme integer NOT NULL DEFAULT nextval('filme_id_filme_seq'::regclass),
    titulo character varying COLLATE pg_catalog."default" NOT NULL,
    diretor character varying COLLATE pg_catalog."default",
    ano integer,
    elenco character varying COLLATE pg_catalog."default",
    premios character varying COLLATE pg_catalog."default",
    imagem character varying COLLATE pg_catalog."default",
    id_categoria integer,
    id_classificacao integer,
    CONSTRAINT filme_pkey PRIMARY KEY (id_filme)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.filme
    OWNER to postgres;

-- Table: public.serie

-- DROP TABLE IF EXISTS public.serie;

CREATE TABLE IF NOT EXISTS public.serie
(
    id_serie integer NOT NULL DEFAULT nextval('serie_id_serie_seq'::regclass),
    titulo character varying COLLATE pg_catalog."default" NOT NULL,
    diretor character varying COLLATE pg_catalog."default",
    ano_inicio integer,
    ano_encerramento integer,
    elenco character varying COLLATE pg_catalog."default",
    premios character varying COLLATE pg_catalog."default",
    imagem character varying COLLATE pg_catalog."default",
    temporadas integer,
    episodios integer,
    id_categoria integer,
    id_classificacao integer,
    CONSTRAINT serie_pkey PRIMARY KEY (id_serie)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.serie
    OWNER to postgres;