--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4 (Ubuntu 12.4-1.pgdg18.04+1)
-- Dumped by pg_dump version 12.4 (Ubuntu 12.4-1.pgdg18.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: acidente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.acidente (
    num_sinistro integer NOT NULL,
    data date NOT NULL,
    local character varying NOT NULL
);


ALTER TABLE public.acidente OWNER TO postgres;

--
-- Name: acidente_num_sinistro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.acidente ALTER COLUMN num_sinistro ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.acidente_num_sinistro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: carro; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carro (
    renavam character varying NOT NULL,
    modelo character varying NOT NULL,
    ano integer NOT NULL
);


ALTER TABLE public.carro OWNER TO postgres;

--
-- Name: id_motorista_sequencia; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.id_motorista_sequencia
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.id_motorista_sequencia OWNER TO postgres;

--
-- Name: participou; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.participou (
    num_sinistro integer NOT NULL,
    renavam character varying NOT NULL,
    id_motorista integer NOT NULL,
    valor_dano double precision NOT NULL
);


ALTER TABLE public.participou OWNER TO postgres;

--
-- Name: pessoa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pessoa (
    id_motorista integer NOT NULL,
    nome character varying NOT NULL,
    endereco character varying
);


ALTER TABLE public.pessoa OWNER TO postgres;

--
-- Name: pessoa_id_motorista_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.pessoa ALTER COLUMN id_motorista ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.pessoa_id_motorista_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: possui; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.possui (
    id_motorista integer NOT NULL,
    renavam character varying NOT NULL
);


ALTER TABLE public.possui OWNER TO postgres;

--
-- Data for Name: acidente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.acidente (num_sinistro, data, local) FROM stdin;
1	2019-03-20	garanhus
2	2018-04-12	recife
3	2011-05-29	petrolina
4	2019-12-31	palmares
5	2019-02-24	garanhus
6	2020-04-05	araripina
7	2013-06-29	lajedo
\.


--
-- Data for Name: carro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.carro (renavam, modelo, ano) FROM stdin;
ff2233ww	gol	2017
dddf3344	classic	2019
g3g322hh	gol	2020
43ff55ss	montana	2010
46657fgd	uno	2011
jkfg2653	estrada	2015
5ol89kfg	polo	2019
00kkjj98	polo	2014
tyf290dd	hilux	2018
456dgv22	toro	2020
rty765nb	fox	2017
hj3245kl	onix	2019
44kk00ll	argo	2019
\.


--
-- Data for Name: participou; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.participou (num_sinistro, renavam, id_motorista, valor_dano) FROM stdin;
1	rty765nb	11	30000
7	dddf3344	5	4000
4	456dgv22	10	16000
6	tyf290dd	11	28000
5	46657fgd	4	10000
3	44kk00ll	12	25000
4	tyf290dd	6	2000
\.


--
-- Data for Name: pessoa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pessoa (id_motorista, nome, endereco) FROM stdin;
1	maria felomena	rua das dores
2	Eduardo ramos	rua da saudade
3	Miguel flores	rua do futuro
4	helena queiroz	rua da paixao
5	Luana barreto	rua da boa vista
6	antonio silverio	rua do correio
7	quiteria matilde	rua do correio
8	sergio leite	rua do matadouro
9	maria augusta	rua da favela
10	Maria das dores	rua da estacao
11	John Smith	rua Edmundo gusmao
12	Carlos oliveira	rua cleto campelo
\.


--
-- Data for Name: possui; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.possui (id_motorista, renavam) FROM stdin;
3	00kkjj98
9	43ff55ss
10	456dgv22
4	46657fgd
5	dddf3344
2	5ol89kfg
1	ff2233ww
7	g3g322hh
8	jkfg2653
11	rty765nb
11	tyf290dd
11	44kk00ll
6	hj3245kl
\.


--
-- Name: acidente_num_sinistro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.acidente_num_sinistro_seq', 7, true);


--
-- Name: id_motorista_sequencia; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.id_motorista_sequencia', 1, false);


--
-- Name: pessoa_id_motorista_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pessoa_id_motorista_seq', 12, true);


--
-- Name: acidente acidente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.acidente
    ADD CONSTRAINT acidente_pkey PRIMARY KEY (num_sinistro);


--
-- Name: carro carro_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_pkey PRIMARY KEY (renavam);


--
-- Name: participou participou_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.participou
    ADD CONSTRAINT participou_pkey PRIMARY KEY (num_sinistro, renavam);


--
-- Name: pessoa pessoa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_pkey PRIMARY KEY (id_motorista);


--
-- Name: possui possui_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.possui
    ADD CONSTRAINT possui_pkey PRIMARY KEY (id_motorista, renavam);


--
-- Name: possui id_motorista; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.possui
    ADD CONSTRAINT id_motorista FOREIGN KEY (id_motorista) REFERENCES public.pessoa(id_motorista);


--
-- Name: participou id_motorista; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.participou
    ADD CONSTRAINT id_motorista FOREIGN KEY (id_motorista) REFERENCES public.pessoa(id_motorista);


--
-- Name: participou num_sinistro; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.participou
    ADD CONSTRAINT num_sinistro FOREIGN KEY (num_sinistro) REFERENCES public.acidente(num_sinistro);


--
-- Name: possui renavam; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.possui
    ADD CONSTRAINT renavam FOREIGN KEY (renavam) REFERENCES public.carro(renavam);


--
-- Name: participou renavam; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.participou
    ADD CONSTRAINT renavam FOREIGN KEY (renavam) REFERENCES public.carro(renavam);


--
-- PostgreSQL database dump complete
--

