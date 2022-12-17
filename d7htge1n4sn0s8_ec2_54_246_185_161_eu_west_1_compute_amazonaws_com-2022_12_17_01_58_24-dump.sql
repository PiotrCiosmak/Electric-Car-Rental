--
-- PostgreSQL database dump
--

-- Dumped from database version 14.6 (Ubuntu 14.6-1.pgdg20.04+1)
-- Dumped by pg_dump version 15.0

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

--
-- Name: heroku_ext; Type: SCHEMA; Schema: -; Owner: u9h9ekcio4da9o
--

CREATE SCHEMA heroku_ext;


ALTER SCHEMA heroku_ext OWNER TO u9h9ekcio4da9o;

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: vmwxlocoioccvj
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO vmwxlocoioccvj;

--
-- Name: pg_stat_statements; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_stat_statements WITH SCHEMA heroku_ext;


--
-- Name: EXTENSION pg_stat_statements; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_stat_statements IS 'track planning and execution statistics of all SQL statements executed';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cars; Type: TABLE; Schema: public; Owner: vmwxlocoioccvj
--

CREATE TABLE public.cars (
    id_car bigint NOT NULL,
    name character varying(255) NOT NULL,
    price double precision NOT NULL,
    "timeTo100" double precision DEFAULT 0 NOT NULL,
    img_source character varying(255) DEFAULT 0 NOT NULL
);


ALTER TABLE public.cars OWNER TO vmwxlocoioccvj;

--
-- Name: car_id_seq; Type: SEQUENCE; Schema: public; Owner: vmwxlocoioccvj
--

CREATE SEQUENCE public.car_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.car_id_seq OWNER TO vmwxlocoioccvj;

--
-- Name: car_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: vmwxlocoioccvj
--

ALTER SEQUENCE public.car_id_seq OWNED BY public.cars.id_car;


--
-- Name: rents; Type: TABLE; Schema: public; Owner: vmwxlocoioccvj
--

CREATE TABLE public.rents (
    id_rent bigint NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL,
    id_user bigint NOT NULL,
    id_car bigint NOT NULL
);


ALTER TABLE public.rents OWNER TO vmwxlocoioccvj;

--
-- Name: rents_id_rent_seq; Type: SEQUENCE; Schema: public; Owner: vmwxlocoioccvj
--

CREATE SEQUENCE public.rents_id_rent_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rents_id_rent_seq OWNER TO vmwxlocoioccvj;

--
-- Name: rents_id_rent_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: vmwxlocoioccvj
--

ALTER SEQUENCE public.rents_id_rent_seq OWNED BY public.rents.id_rent;


--
-- Name: users; Type: TABLE; Schema: public; Owner: vmwxlocoioccvj
--

CREATE TABLE public.users (
    id_user bigint NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    is_admin boolean DEFAULT false NOT NULL
);


ALTER TABLE public.users OWNER TO vmwxlocoioccvj;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: vmwxlocoioccvj
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO vmwxlocoioccvj;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: vmwxlocoioccvj
--

ALTER SEQUENCE public.user_id_seq OWNED BY public.users.id_user;


--
-- Name: users_data; Type: TABLE; Schema: public; Owner: vmwxlocoioccvj
--

CREATE TABLE public.users_data (
    id_user_data bigint NOT NULL,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    phone_number character varying(100) NOT NULL,
    street character varying(255) NOT NULL,
    house_number character varying(100) NOT NULL,
    apartment_number character varying(100),
    post_code character varying(100) NOT NULL,
    town character varying(255) NOT NULL,
    id_user bigint NOT NULL
);


ALTER TABLE public.users_data OWNER TO vmwxlocoioccvj;

--
-- Name: users_data_id_user_data_seq; Type: SEQUENCE; Schema: public; Owner: vmwxlocoioccvj
--

CREATE SEQUENCE public.users_data_id_user_data_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_data_id_user_data_seq OWNER TO vmwxlocoioccvj;

--
-- Name: users_data_id_user_data_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: vmwxlocoioccvj
--

ALTER SEQUENCE public.users_data_id_user_data_seq OWNED BY public.users_data.id_user_data;


--
-- Name: cars id_car; Type: DEFAULT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.cars ALTER COLUMN id_car SET DEFAULT nextval('public.car_id_seq'::regclass);


--
-- Name: rents id_rent; Type: DEFAULT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.rents ALTER COLUMN id_rent SET DEFAULT nextval('public.rents_id_rent_seq'::regclass);


--
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.user_id_seq'::regclass);


--
-- Name: users_data id_user_data; Type: DEFAULT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.users_data ALTER COLUMN id_user_data SET DEFAULT nextval('public.users_data_id_user_data_seq'::regclass);


--
-- Data for Name: cars; Type: TABLE DATA; Schema: public; Owner: vmwxlocoioccvj
--

INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (10, 'Fiat 500', 600, 10.5, 'fiat_500');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (4, 'Nissan Leaf', 2000, 6.9, 'nissan_leaf');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (2, 'Porsche Taycan', 3000, 2.6, 'porsche_taycan');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (5, 'BMW I3', 650, 7.1, 'bmw_i3');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (6, 'Renault Zoe', 600, 9.5, 'renault_zoe');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (11, 'Kia Niro', 800, 7.6, 'kia_niro');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (8, 'Tesla Model S', 1800, 2.1, 'tesla_model_s');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (28, 'Tesla Model Y', 2600, 2.1, 'tesla_model_y');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (22, 'Tesla Model X', 2400, 2.5, 'tesla_model_x');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (13, 'Skoda Enyaq', 1000, 8.6, 'skoda_enyaq');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (1, 'Ferrari F40', 4000, 3.5, 'f40');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (9, 'Mazda MX-30', 950, 9.7, 'mazda_mx_30');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (3, 'Audi RS E-tron GT', 1800, 3.3, 'audi_rs_e_tron_gt');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (12, 'Volkswagen ID.Buzz', 1200, 10.2, 'volkswagen_id_buzz');
INSERT INTO public.cars (id_car, name, price, "timeTo100", img_source) VALUES (7, 'Volkswagen ID.5', 700, 6.3, 'volkswagen_id_5');


--
-- Data for Name: rents; Type: TABLE DATA; Schema: public; Owner: vmwxlocoioccvj
--

INSERT INTO public.rents (id_rent, start_date, end_date, id_user, id_car) VALUES (13, '2022-12-14', '2022-12-18', 103, 2);
INSERT INTO public.rents (id_rent, start_date, end_date, id_user, id_car) VALUES (14, '2022-12-29', '2022-12-31', 103, 2);
INSERT INTO public.rents (id_rent, start_date, end_date, id_user, id_car) VALUES (15, '2023-01-13', '2023-01-15', 103, 2);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: vmwxlocoioccvj
--

INSERT INTO public.users (id_user, email, password, is_admin) VALUES (104, 'kamildabek12@gmail.com', '$2y$12$BRL85G26D3FHvWprQhGt6eO7j6Eq3VVFENqvDX6wwzDThTWGDPCp6', false);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (106, 'julia.gutowska.2003@gmail.com', '$2y$12$CGVih/b4rAu1M2ztafSFjuUl8.zcGrhTDzu9tuMu4Jf5MyT4sL2Ni', false);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (107, 'janbak@onet.pl', '$2y$12$.mz0xu4FXzUoWZ5wFMGVaOirgM/ebDAfSUFMYidk6SAKAdsx9z2Iu', false);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (109, 'janinabok@onet.pl', '$2y$12$QgyCfPefPRz/XEu0tJN4sOWikRLf7.mno6gUCO0mlG/z2P4ZW/S2u', false);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (111, 'test@gmail.com', '$2y$12$xvHr5M0rx.BkHa8MyuIIG.Rx1pbZ9tWPyiiUSFgjc5P2mcJBIlfhG', false);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (105, 'ola123@onet.pl', '$2y$12$ebsyvgJvqqnusp7.yWvBNu6dclocOD1xcz3dzPSZ4Ziqp8hROPDoe', false);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (108, 'kowla@onet.pl', '$2y$12$Adk6tAQXDEd0oDVx0NQLS.6lVhC2ZzfcQ7H6BRbuLVkxtvsPWO0Ri', false);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (103, 'piotrciosmak2001@gmail.com', '$2y$12$HCWsrCJbv7Hms4t5ZT/XbOFnEZ0ZgYs82/NJIULrRoLH/zZUozc5y', true);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (110, 'dada@onet.pl', '$2y$12$5ZzeDYMLQnHsVWqCKrqDM.c1sv9hCgCyZHa20rACniY8kVJXCFN52', false);
INSERT INTO public.users (id_user, email, password, is_admin) VALUES (112, 'ola@onet.pl', '$2y$12$WOnEiMRvmrB9yTd0Q2LFHunsRWaKXKxdS9hRgUJIQG6SYFlUwYby.', false);


--
-- Data for Name: users_data; Type: TABLE DATA; Schema: public; Owner: vmwxlocoioccvj
--

INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (31, 'Piotrrr', 'Ciosmak', '791371715', 'Władysława Broniewskiego', '2C', '', '39-400', 'Tarnobrzeg', 103);
INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (37, 'Janina', 'Bak', '27-854', 'Nowina', '23', '', '27-854', 'Kraśnik', 109);
INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (38, 'Piotr', 'Ciosmak', '791371715', 'Władysława Broniewskiego', '2C', '', '39-400', 'Tarnobrzeg', 110);
INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (39, 'Ola', 'Nowak', '38-573', 'Jasna', '1', '2', '38-573', 'Tarnów', 112);
INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (32, 'Kamil', 'Dąbek', '39-400', 'Jasińskiego', '164', '', '39-400', 'Tarnobrzeg', 104);
INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (33, 'Ola', 'Nowak', '46-392', 'Nowa', '1', '2', '46-392', 'Krosno', 105);
INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (34, 'Julia', 'Gutowska', '42-500', 'Chodźki', '3', '48', '42-500', 'Lublin', 106);
INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (35, 'Janusz', 'Bąk', '84-384', 'Borycza', '2', '', '84-384', 'Kłusko', 107);
INSERT INTO public.users_data (id_user_data, first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user) VALUES (36, 'Piotr', 'Ciosmak', '39-400', 'Władysława Broniewskiego', '2C', '', '39-400', 'Tarnobrzeg', 108);


--
-- Name: car_id_seq; Type: SEQUENCE SET; Schema: public; Owner: vmwxlocoioccvj
--

SELECT pg_catalog.setval('public.car_id_seq', 28, true);


--
-- Name: rents_id_rent_seq; Type: SEQUENCE SET; Schema: public; Owner: vmwxlocoioccvj
--

SELECT pg_catalog.setval('public.rents_id_rent_seq', 15, true);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: vmwxlocoioccvj
--

SELECT pg_catalog.setval('public.user_id_seq', 112, true);


--
-- Name: users_data_id_user_data_seq; Type: SEQUENCE SET; Schema: public; Owner: vmwxlocoioccvj
--

SELECT pg_catalog.setval('public.users_data_id_user_data_seq', 39, true);


--
-- Name: cars car_pk; Type: CONSTRAINT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT car_pk PRIMARY KEY (id_car);


--
-- Name: rents rents_pk; Type: CONSTRAINT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.rents
    ADD CONSTRAINT rents_pk PRIMARY KEY (id_rent);


--
-- Name: users user_pk; Type: CONSTRAINT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_pk PRIMARY KEY (id_user);


--
-- Name: users_data users_data_pk; Type: CONSTRAINT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.users_data
    ADD CONSTRAINT users_data_pk PRIMARY KEY (id_user_data);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk UNIQUE (email);


--
-- Name: rents rents_cars_null_fk; Type: FK CONSTRAINT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.rents
    ADD CONSTRAINT rents_cars_null_fk FOREIGN KEY (id_car) REFERENCES public.cars(id_car) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: rents rents_users_null_fk; Type: FK CONSTRAINT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.rents
    ADD CONSTRAINT rents_users_null_fk FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users_data users_data_users_null_fk; Type: FK CONSTRAINT; Schema: public; Owner: vmwxlocoioccvj
--

ALTER TABLE ONLY public.users_data
    ADD CONSTRAINT users_data_users_null_fk FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: SCHEMA heroku_ext; Type: ACL; Schema: -; Owner: u9h9ekcio4da9o
--

GRANT USAGE ON SCHEMA heroku_ext TO vmwxlocoioccvj;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: vmwxlocoioccvj
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO vmwxlocoioccvj;


--
-- PostgreSQL database dump complete
--

