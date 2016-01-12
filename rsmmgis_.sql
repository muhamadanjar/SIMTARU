--
-- PostgreSQL database dump
--

-- Dumped from database version 9.0.20
-- Dumped by pg_dump version 9.0.20
-- Started on 2015-06-17 08:44:12

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- TOC entry 488 (class 2612 OID 11574)
-- Name: plpgsql; Type: PROCEDURAL LANGUAGE; Schema: -; Owner: postgres
--

CREATE OR REPLACE PROCEDURAL LANGUAGE plpgsql;


ALTER PROCEDURAL LANGUAGE plpgsql OWNER TO postgres;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 153 (class 1259 OID 16582)
-- Dependencies: 5
-- Name: bookmark; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE bookmark (
    id integer NOT NULL,
    name text NOT NULL,
    x_min double precision NOT NULL,
    y_min double precision NOT NULL,
    x_max double precision NOT NULL,
    y_max double precision NOT NULL,
    wkid integer NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.bookmark OWNER TO postgres;

--
-- TOC entry 152 (class 1259 OID 16580)
-- Dependencies: 5 153
-- Name: bookmark_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bookmark_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bookmark_id_seq OWNER TO postgres;

--
-- TOC entry 1857 (class 0 OID 0)
-- Dependencies: 152
-- Name: bookmark_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bookmark_id_seq OWNED BY bookmark.id;


--
-- TOC entry 1858 (class 0 OID 0)
-- Dependencies: 152
-- Name: bookmark_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bookmark_id_seq', 1, false);


--
-- TOC entry 155 (class 1259 OID 16593)
-- Dependencies: 5
-- Name: identify; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE identify (
    id_identify integer NOT NULL,
    title character varying(60) NOT NULL,
    layername character varying(60) NOT NULL,
    layerid integer NOT NULL,
    display character varying(10) NOT NULL,
    description text NOT NULL,
    key_ text NOT NULL,
    media text NOT NULL,
    showattachments boolean NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.identify OWNER TO postgres;

--
-- TOC entry 154 (class 1259 OID 16591)
-- Dependencies: 155 5
-- Name: identify_id_identify_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE identify_id_identify_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.identify_id_identify_seq OWNER TO postgres;

--
-- TOC entry 1859 (class 0 OID 0)
-- Dependencies: 154
-- Name: identify_id_identify_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE identify_id_identify_seq OWNED BY identify.id_identify;


--
-- TOC entry 1860 (class 0 OID 0)
-- Dependencies: 154
-- Name: identify_id_identify_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('identify_id_identify_seq', 5, true);


--
-- TOC entry 151 (class 1259 OID 16574)
-- Dependencies: 5
-- Name: layer_; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE layer_ (
    id_layer integer NOT NULL,
    layername character varying(100) NOT NULL,
    layerurl character varying(200) NOT NULL,
    layer character varying(50) NOT NULL,
    leveluser character varying(60) NOT NULL,
    na character varying(1) NOT NULL,
    grafik character varying(50) NOT NULL,
    id_grouplayer integer NOT NULL,
    orderlayer integer NOT NULL,
    tipelayer character varying(10) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.layer_ OWNER TO postgres;

--
-- TOC entry 150 (class 1259 OID 16572)
-- Dependencies: 5 151
-- Name: layer__id_layer_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE layer__id_layer_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.layer__id_layer_seq OWNER TO postgres;

--
-- TOC entry 1861 (class 0 OID 0)
-- Dependencies: 150
-- Name: layer__id_layer_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE layer__id_layer_seq OWNED BY layer_.id_layer;


--
-- TOC entry 1862 (class 0 OID 0)
-- Dependencies: 150
-- Name: layer__id_layer_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('layer__id_layer_seq', 5, true);


--
-- TOC entry 149 (class 1259 OID 16566)
-- Dependencies: 5
-- Name: level_users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE level_users (
    iduserlevel integer NOT NULL,
    user_level character varying(50) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.level_users OWNER TO postgres;

--
-- TOC entry 148 (class 1259 OID 16564)
-- Dependencies: 5 149
-- Name: level_users_iduserlevel_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE level_users_iduserlevel_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.level_users_iduserlevel_seq OWNER TO postgres;

--
-- TOC entry 1863 (class 0 OID 0)
-- Dependencies: 148
-- Name: level_users_iduserlevel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE level_users_iduserlevel_seq OWNED BY level_users.iduserlevel;


--
-- TOC entry 1864 (class 0 OID 0)
-- Dependencies: 148
-- Name: level_users_iduserlevel_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('level_users_iduserlevel_seq', 1, false);


--
-- TOC entry 142 (class 1259 OID 16532)
-- Dependencies: 5
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 147 (class 1259 OID 16558)
-- Dependencies: 5
-- Name: modul; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE modul (
    id_modul integer NOT NULL,
    nama_modul character varying(100) NOT NULL,
    modul character varying(50) NOT NULL,
    script character varying(50) NOT NULL,
    leveluser character varying(20) NOT NULL,
    na character varying(1) NOT NULL,
    tampil character varying(5) NOT NULL,
    tipe_modul integer NOT NULL,
    id_groupmodul integer NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.modul OWNER TO postgres;

--
-- TOC entry 146 (class 1259 OID 16556)
-- Dependencies: 147 5
-- Name: modul_id_modul_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE modul_id_modul_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.modul_id_modul_seq OWNER TO postgres;

--
-- TOC entry 1865 (class 0 OID 0)
-- Dependencies: 146
-- Name: modul_id_modul_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE modul_id_modul_seq OWNED BY modul.id_modul;


--
-- TOC entry 1866 (class 0 OID 0)
-- Dependencies: 146
-- Name: modul_id_modul_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('modul_id_modul_seq', 1, false);


--
-- TOC entry 145 (class 1259 OID 16548)
-- Dependencies: 5
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- TOC entry 144 (class 1259 OID 16537)
-- Dependencies: 5
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    username character varying(20) NOT NULL,
    password character varying(60) NOT NULL,
    leveluser character varying(60) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 143 (class 1259 OID 16535)
-- Dependencies: 5 144
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 1867 (class 0 OID 0)
-- Dependencies: 143
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 1868 (class 0 OID 0)
-- Dependencies: 143
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- TOC entry 1826 (class 2604 OID 16585)
-- Dependencies: 153 152 153
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bookmark ALTER COLUMN id SET DEFAULT nextval('bookmark_id_seq'::regclass);


--
-- TOC entry 1827 (class 2604 OID 16596)
-- Dependencies: 155 154 155
-- Name: id_identify; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY identify ALTER COLUMN id_identify SET DEFAULT nextval('identify_id_identify_seq'::regclass);


--
-- TOC entry 1825 (class 2604 OID 16577)
-- Dependencies: 150 151 151
-- Name: id_layer; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY layer_ ALTER COLUMN id_layer SET DEFAULT nextval('layer__id_layer_seq'::regclass);


--
-- TOC entry 1824 (class 2604 OID 16569)
-- Dependencies: 149 148 149
-- Name: iduserlevel; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY level_users ALTER COLUMN iduserlevel SET DEFAULT nextval('level_users_iduserlevel_seq'::regclass);


--
-- TOC entry 1823 (class 2604 OID 16561)
-- Dependencies: 146 147 147
-- Name: id_modul; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY modul ALTER COLUMN id_modul SET DEFAULT nextval('modul_id_modul_seq'::regclass);


--
-- TOC entry 1822 (class 2604 OID 16540)
-- Dependencies: 144 143 144
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 1850 (class 0 OID 16582)
-- Dependencies: 153
-- Data for Name: bookmark; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY bookmark (id, name, x_min, y_min, x_max, y_max, wkid, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 1851 (class 0 OID 16593)
-- Dependencies: 155
-- Data for Name: identify; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY identify (id_identify, title, layername, layerid, display, description, key_, media, showattachments, created_at, updated_at) FROM stdin;
5	{OBJECTID}	LKPP_Paket_Konstruksi_Publik	0	custom	hbhbhb {OBJECTID}	[]	[{"title":"k","caption":"k","type":"image","value":{"sourceURL":"http:\\/\\/partmapservices.ina-sdi.or.id:6080\\/arcgis\\/rest\\/services\\/LKPP\\/LKPP_Paket_Konstruksi_Publik\\/MapServer\\/0\\/1\\/attachments\\/33","linkURL":"k"}}]	f	2015-06-16 15:09:53	2015-06-16 15:50:09
\.


--
-- TOC entry 1849 (class 0 OID 16574)
-- Dependencies: 151
-- Data for Name: layer_; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY layer_ (id_layer, layername, layerurl, layer, leveluser, na, grafik, id_grouplayer, orderlayer, tipelayer, created_at, updated_at) FROM stdin;
2	LKPP_Paket_Konstruksi_Publik	http://partmapservices.ina-sdi.or.id:6080/arcgis/rest/services/LKPP/LKPP_Paket_Konstruksi_Publik/MapServer	LKPP_Paket_Konstruksi_Publik	1,2	N	null	0	0	dynamic	2015-06-08 06:26:10	2015-06-08 06:26:10
3	PETA ADM KAB BOGOR	http://localhost:6080/arcgis/rest/services/BOGOR/PETA_ADMINISTRASI_KABUPATEN_BOGOR_PUBLISH/MapServer	PETA_ADMINISTRASI_KABUPATEN_BOGOR	1	N	null	0	0	dynamic	2015-06-16 10:44:11	2015-06-16 10:44:11
1	Hidrografi 250K	http://portal.ina-sdi.or.id/arcgis/rest/services/IGD/IGD_250K_Hidrografi/MapServer	hidrografi	1	N	null	0	0	dynamic	2015-05-07 06:53:06	2015-06-16 11:22:46
4	PENGGUNAAN LAHAN KABUPATEN BOGOR	http://localhost:6080/arcgis/rest/services/BOGOR/PETA_PENGGUNAAN_LAHAN_KABUPATEN_BOGOR_PUBLISH/MapServer	PETA_PENGGUNAAN_LAHAN_KABUPATEN_BOGOR	1	N	null	0	0	dynamic	2015-06-16 11:33:37	2015-06-16 11:33:37
5	LokasiMenarik	http://partmapservices.ina-sdi.or.id:6080/arcgis/rest/services/KOTABOGOR/LokasiMenarik/MapServer	lokasimenarik	1	N	null	0	0	dynamic	2015-06-16 16:47:33	2015-06-16 16:47:33
\.


--
-- TOC entry 1848 (class 0 OID 16566)
-- Dependencies: 149
-- Data for Name: level_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY level_users (iduserlevel, user_level, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 1844 (class 0 OID 16532)
-- Dependencies: 142
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migrations (migration, batch) FROM stdin;
2014_10_12_000000_create_users_table	1
2014_10_12_100000_create_password_resets_table	1
2015_05_06_093224_modul	1
2015_05_07_032639_level_users	1
2015_05_11_060601_layer	1
2015_05_15_042832_bookmark	1
2015_06_01_065513_identifi	1
\.


--
-- TOC entry 1847 (class 0 OID 16558)
-- Dependencies: 147
-- Data for Name: modul; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY modul (id_modul, nama_modul, modul, script, leveluser, na, tampil, tipe_modul, id_groupmodul, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 1846 (class 0 OID 16548)
-- Dependencies: 145
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 1845 (class 0 OID 16537)
-- Dependencies: 144
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, name, email, username, password, leveluser, remember_token, created_at, updated_at) FROM stdin;
1	Muhamad Anjar	arvanria@gmail.com	muhamadanjar	$2y$10$z6RS2UICxyhRyAFueiXk3urYFQ1Zs.knZI791iV1wmnjLgMU9s7Xi	1,2	2Y37D2d5zC915bTiLJHLFpBbL1EnJOgi3j7Asu9KJVpaNebIPbtfnJAotQOb	2015-05-07 06:53:06	2015-05-08 09:47:44
2	Admin Arcgis	admin@rsmm.com	admin	$2y$10$MKMaR5aAr6hjOZSSgJQzYedbGo854d7J9.Nm5YrS3vKbUkbpZTm.q	1,2	yZy2wW0PZU90pqEnIpr0uxYb66XZlfik0GVVefqDRtLwEJWyZ8mYLhsKdzUR	2015-06-08 06:24:15	2015-06-16 14:55:17
\.


--
-- TOC entry 1841 (class 2606 OID 16590)
-- Dependencies: 153 153
-- Name: bookmark_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bookmark
    ADD CONSTRAINT bookmark_pkey PRIMARY KEY (id);


--
-- TOC entry 1843 (class 2606 OID 16601)
-- Dependencies: 155 155
-- Name: identify_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY identify
    ADD CONSTRAINT identify_pkey PRIMARY KEY (id_identify);


--
-- TOC entry 1839 (class 2606 OID 16579)
-- Dependencies: 151 151
-- Name: layer__pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY layer_
    ADD CONSTRAINT layer__pkey PRIMARY KEY (id_layer);


--
-- TOC entry 1837 (class 2606 OID 16571)
-- Dependencies: 149 149
-- Name: level_users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY level_users
    ADD CONSTRAINT level_users_pkey PRIMARY KEY (iduserlevel);


--
-- TOC entry 1835 (class 2606 OID 16563)
-- Dependencies: 147 147
-- Name: modul_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY modul
    ADD CONSTRAINT modul_pkey PRIMARY KEY (id_modul);


--
-- TOC entry 1829 (class 2606 OID 16547)
-- Dependencies: 144 144
-- Name: users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 1831 (class 2606 OID 16545)
-- Dependencies: 144 144
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 1832 (class 1259 OID 16554)
-- Dependencies: 145
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- TOC entry 1833 (class 1259 OID 16555)
-- Dependencies: 145
-- Name: password_resets_token_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX password_resets_token_index ON password_resets USING btree (token);


--
-- TOC entry 1856 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-06-17 08:44:13

--
-- PostgreSQL database dump complete
--

