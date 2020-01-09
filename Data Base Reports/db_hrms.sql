--
-- PostgreSQL database dump
--

-- Dumped from database version 10.9
-- Dumped by pg_dump version 10.9

-- Started on 2020-01-08 18:02:02

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
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 3557 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 249 (class 1259 OID 17755)
-- Name: tbl_applicant_qualification; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_applicant_qualification (
    id integer NOT NULL,
    apid integer NOT NULL,
    orgname character varying(50) NOT NULL,
    board character varying(30) NOT NULL,
    examname character varying(20) NOT NULL,
    yop smallint NOT NULL,
    totalmark smallint NOT NULL,
    securedmark smallint NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    CONSTRAINT tbl_applicant_qualification_check CHECK ((securedmark < totalmark)),
    CONSTRAINT tbl_applicant_qualification_totalmark_check CHECK ((totalmark > '0'::smallint)),
    CONSTRAINT tbl_applicant_qualification_yop_check CHECK ((yop > '1900'::smallint))
);


ALTER TABLE public.tbl_applicant_qualification OWNER TO postgres;

--
-- TOC entry 248 (class 1259 OID 17753)
-- Name: tbl_applicant_qualification_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_applicant_qualification_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_applicant_qualification_id_seq OWNER TO postgres;

--
-- TOC entry 3558 (class 0 OID 0)
-- Dependencies: 248
-- Name: tbl_applicant_qualification_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_applicant_qualification_id_seq OWNED BY public.tbl_applicant_qualification.id;


--
-- TOC entry 259 (class 1259 OID 18041)
-- Name: tbl_applicant_work_experiance; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_applicant_work_experiance (
    id integer NOT NULL,
    apid integer NOT NULL,
    etid smallint NOT NULL,
    providedby character varying(30),
    startdate date,
    enddate date,
    role character varying(20),
    remark character varying(255),
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    CONSTRAINT tbl_applicant_work_experiance_check CHECK ((startdate < enddate))
);


ALTER TABLE public.tbl_applicant_work_experiance OWNER TO postgres;

--
-- TOC entry 258 (class 1259 OID 18039)
-- Name: tbl_applicant_work_experiance_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_applicant_work_experiance_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_applicant_work_experiance_id_seq OWNER TO postgres;

--
-- TOC entry 3559 (class 0 OID 0)
-- Dependencies: 258
-- Name: tbl_applicant_work_experiance_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_applicant_work_experiance_id_seq OWNED BY public.tbl_applicant_work_experiance.id;


--
-- TOC entry 270 (class 1259 OID 34770)
-- Name: tbl_assurance; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_assurance (
    id integer NOT NULL,
    assurance character varying(20) NOT NULL,
    entryby integer NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_assurance OWNER TO postgres;

--
-- TOC entry 269 (class 1259 OID 34768)
-- Name: tbl_assurance_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_assurance_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_assurance_id_seq OWNER TO postgres;

--
-- TOC entry 3560 (class 0 OID 0)
-- Dependencies: 269
-- Name: tbl_assurance_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_assurance_id_seq OWNED BY public.tbl_assurance.id;


--
-- TOC entry 282 (class 1259 OID 43383)
-- Name: tbl_attendance; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_attendance (
    id integer NOT NULL,
    empid integer NOT NULL,
    date date,
    status integer,
    intime time without time zone,
    outtime time without time zone,
    entryby integer NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_attendance OWNER TO postgres;

--
-- TOC entry 281 (class 1259 OID 43381)
-- Name: tbl_attendance_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_attendance_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_attendance_id_seq OWNER TO postgres;

--
-- TOC entry 3561 (class 0 OID 0)
-- Dependencies: 281
-- Name: tbl_attendance_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_attendance_id_seq OWNED BY public.tbl_attendance.id;


--
-- TOC entry 264 (class 1259 OID 34686)
-- Name: tbl_attendance_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_attendance_type (
    id integer NOT NULL,
    typename character varying(20),
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_attendance_type OWNER TO postgres;

--
-- TOC entry 263 (class 1259 OID 34684)
-- Name: tbl_attendance_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_attendance_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_attendance_type_id_seq OWNER TO postgres;

--
-- TOC entry 3562 (class 0 OID 0)
-- Dependencies: 263
-- Name: tbl_attendance_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_attendance_type_id_seq OWNED BY public.tbl_attendance_type.id;


--
-- TOC entry 229 (class 1259 OID 17085)
-- Name: tbl_bank_name; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_bank_name (
    id smallint NOT NULL,
    bankname character varying(60) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    bankshortname character varying(10)
);


ALTER TABLE public.tbl_bank_name OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 17083)
-- Name: tbl_bank_name_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_bank_name_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_bank_name_id_seq OWNER TO postgres;

--
-- TOC entry 3563 (class 0 OID 0)
-- Dependencies: 228
-- Name: tbl_bank_name_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_bank_name_id_seq OWNED BY public.tbl_bank_name.id;


--
-- TOC entry 257 (class 1259 OID 18001)
-- Name: tbl_communication_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_communication_details (
    id integer NOT NULL,
    apid integer NOT NULL,
    at character varying(25),
    po character varying(25),
    ps character varying(25),
    landmark character varying(25),
    dist integer NOT NULL,
    state integer NOT NULL,
    pincode integer NOT NULL,
    commtid smallint NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_communication_details OWNER TO postgres;

--
-- TOC entry 256 (class 1259 OID 17999)
-- Name: tbl_communication_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_communication_details_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_communication_details_id_seq OWNER TO postgres;

--
-- TOC entry 3564 (class 0 OID 0)
-- Dependencies: 256
-- Name: tbl_communication_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_communication_details_id_seq OWNED BY public.tbl_communication_details.id;


--
-- TOC entry 254 (class 1259 OID 17916)
-- Name: tbl_communication_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_communication_type (
    id smallint NOT NULL,
    type character varying(10) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_communication_type OWNER TO postgres;

--
-- TOC entry 253 (class 1259 OID 17914)
-- Name: tbl_communication_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_communication_type_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_communication_type_id_seq OWNER TO postgres;

--
-- TOC entry 3565 (class 0 OID 0)
-- Dependencies: 253
-- Name: tbl_communication_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_communication_type_id_seq OWNED BY public.tbl_communication_type.id;


--
-- TOC entry 209 (class 1259 OID 16727)
-- Name: tbl_company; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_company (
    id smallint NOT NULL,
    companytypeid smallint NOT NULL,
    companyname text NOT NULL,
    companyshortname character varying(5) NOT NULL,
    establishedon date NOT NULL,
    gstno character varying(30) NOT NULL,
    address text NOT NULL,
    distid smallint NOT NULL,
    pincode integer NOT NULL,
    logo character varying(30) DEFAULT NULL::character varying,
    url character varying(60) NOT NULL,
    emailid character varying(60) NOT NULL,
    mobile character varying(50) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    CONSTRAINT tbl_company_pincode_check CHECK ((pincode > 100000))
);


ALTER TABLE public.tbl_company OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16725)
-- Name: tbl_company_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_company_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_company_id_seq OWNER TO postgres;

--
-- TOC entry 3566 (class 0 OID 0)
-- Dependencies: 208
-- Name: tbl_company_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_company_id_seq OWNED BY public.tbl_company.id;


--
-- TOC entry 207 (class 1259 OID 16705)
-- Name: tbl_company_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_company_type (
    id smallint NOT NULL,
    typename character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    typeshortname character varying(10)
);


ALTER TABLE public.tbl_company_type OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16703)
-- Name: tbl_company_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_company_type_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_company_type_id_seq OWNER TO postgres;

--
-- TOC entry 3567 (class 0 OID 0)
-- Dependencies: 206
-- Name: tbl_company_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_company_type_id_seq OWNED BY public.tbl_company_type.id;


--
-- TOC entry 279 (class 1259 OID 43320)
-- Name: tbl_datemanagement; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_datemanagement (
    id integer NOT NULL,
    date date,
    datetype integer NOT NULL,
    entryby integer NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_datemanagement OWNER TO postgres;

--
-- TOC entry 278 (class 1259 OID 43318)
-- Name: tbl_datemanagement_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_datemanagement_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_datemanagement_id_seq OWNER TO postgres;

--
-- TOC entry 3568 (class 0 OID 0)
-- Dependencies: 278
-- Name: tbl_datemanagement_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_datemanagement_id_seq OWNED BY public.tbl_datemanagement.id;


--
-- TOC entry 277 (class 1259 OID 43305)
-- Name: tbl_datetype; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_datetype (
    id integer NOT NULL,
    name character varying(30),
    entryby integer NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_datetype OWNER TO postgres;

--
-- TOC entry 276 (class 1259 OID 43303)
-- Name: tbl_datetype_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_datetype_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_datetype_id_seq OWNER TO postgres;

--
-- TOC entry 3569 (class 0 OID 0)
-- Dependencies: 276
-- Name: tbl_datetype_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_datetype_id_seq OWNED BY public.tbl_datetype.id;


--
-- TOC entry 219 (class 1259 OID 16860)
-- Name: tbl_department; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_department (
    id smallint NOT NULL,
    departmentname character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    departmentshortname character varying(10)
);


ALTER TABLE public.tbl_department OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 16858)
-- Name: tbl_department_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_department_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_department_id_seq OWNER TO postgres;

--
-- TOC entry 3570 (class 0 OID 0)
-- Dependencies: 218
-- Name: tbl_department_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_department_id_seq OWNED BY public.tbl_department.id;


--
-- TOC entry 223 (class 1259 OID 16905)
-- Name: tbl_department_mapping; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_department_mapping (
    id integer NOT NULL,
    departmentid smallint NOT NULL,
    companyid smallint NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_department_mapping OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 16903)
-- Name: tbl_department_mapping_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_department_mapping_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_department_mapping_id_seq OWNER TO postgres;

--
-- TOC entry 3571 (class 0 OID 0)
-- Dependencies: 222
-- Name: tbl_department_mapping_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_department_mapping_id_seq OWNED BY public.tbl_department_mapping.id;


--
-- TOC entry 221 (class 1259 OID 16883)
-- Name: tbl_designation; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_designation (
    id smallint NOT NULL,
    designationname character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    designationshortname character varying(10)
);


ALTER TABLE public.tbl_designation OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 16881)
-- Name: tbl_designation_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_designation_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_designation_id_seq OWNER TO postgres;

--
-- TOC entry 3572 (class 0 OID 0)
-- Dependencies: 220
-- Name: tbl_designation_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_designation_id_seq OWNED BY public.tbl_designation.id;


--
-- TOC entry 205 (class 1259 OID 16678)
-- Name: tbl_district; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_district (
    id smallint NOT NULL,
    stateid smallint NOT NULL,
    distname character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    distshortname character varying(5)
);


ALTER TABLE public.tbl_district OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16676)
-- Name: tbl_district_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_district_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_district_id_seq OWNER TO postgres;

--
-- TOC entry 3573 (class 0 OID 0)
-- Dependencies: 204
-- Name: tbl_district_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_district_id_seq OWNED BY public.tbl_district.id;


--
-- TOC entry 217 (class 1259 OID 16838)
-- Name: tbl_education; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_education (
    id smallint NOT NULL,
    educationname character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    educationshortname character varying(10)
);


ALTER TABLE public.tbl_education OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 16836)
-- Name: tbl_education_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_education_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_education_id_seq OWNER TO postgres;

--
-- TOC entry 3574 (class 0 OID 0)
-- Dependencies: 216
-- Name: tbl_education_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_education_id_seq OWNED BY public.tbl_education.id;


--
-- TOC entry 227 (class 1259 OID 17009)
-- Name: tbl_employee; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_employee (
    id smallint NOT NULL,
    tempid integer NOT NULL,
    slno integer NOT NULL,
    departmentmappingid integer NOT NULL,
    designationid smallint NOT NULL,
    doj date NOT NULL,
    dol date,
    empid character varying(20) NOT NULL,
    fname character varying(20) NOT NULL,
    mname character varying(20) DEFAULT NULL::character varying,
    lname character varying(20) NOT NULL,
    genderid smallint NOT NULL,
    mobile bigint NOT NULL,
    emailid character varying(60) NOT NULL,
    fathername character varying(60) NOT NULL,
    mothername character varying(60) NOT NULL,
    maritalstatusid smallint,
    spousename character varying(60) DEFAULT NULL::character varying,
    educationid smallint NOT NULL,
    address character varying(200) NOT NULL,
    districtid smallint NOT NULL,
    dob date NOT NULL,
    epfno character varying(30) NOT NULL,
    esifno character varying(30) NOT NULL,
    panno character varying(30) NOT NULL,
    aadharno character varying(30) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_employee OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 17107)
-- Name: tbl_employee_bank_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_employee_bank_details (
    id smallint NOT NULL,
    empid integer NOT NULL,
    bankid integer NOT NULL,
    acno character varying(30) NOT NULL,
    ifsccode character varying(12) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_employee_bank_details OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 17105)
-- Name: tbl_employee_bank_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_employee_bank_details_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_employee_bank_details_id_seq OWNER TO postgres;

--
-- TOC entry 3575 (class 0 OID 0)
-- Dependencies: 230
-- Name: tbl_employee_bank_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_employee_bank_details_id_seq OWNED BY public.tbl_employee_bank_details.id;


--
-- TOC entry 226 (class 1259 OID 17007)
-- Name: tbl_employee_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_employee_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_employee_id_seq OWNER TO postgres;

--
-- TOC entry 3576 (class 0 OID 0)
-- Dependencies: 226
-- Name: tbl_employee_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_employee_id_seq OWNED BY public.tbl_employee.id;


--
-- TOC entry 211 (class 1259 OID 16772)
-- Name: tbl_employee_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_employee_type (
    id smallint NOT NULL,
    typename character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    typeshortname character varying(10)
);


ALTER TABLE public.tbl_employee_type OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 16770)
-- Name: tbl_employee_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_employee_type_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_employee_type_id_seq OWNER TO postgres;

--
-- TOC entry 3577 (class 0 OID 0)
-- Dependencies: 210
-- Name: tbl_employee_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_employee_type_id_seq OWNED BY public.tbl_employee_type.id;


--
-- TOC entry 252 (class 1259 OID 17890)
-- Name: tbl_experiance_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_experiance_type (
    id smallint NOT NULL,
    type character varying(10) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_experiance_type OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 17886)
-- Name: tbl_experiance_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_experiance_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_experiance_type_id_seq OWNER TO postgres;

--
-- TOC entry 251 (class 1259 OID 17888)
-- Name: tbl_experiance_type_id_seq1; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_experiance_type_id_seq1
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_experiance_type_id_seq1 OWNER TO postgres;

--
-- TOC entry 3578 (class 0 OID 0)
-- Dependencies: 251
-- Name: tbl_experiance_type_id_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_experiance_type_id_seq1 OWNED BY public.tbl_experiance_type.id;


--
-- TOC entry 213 (class 1259 OID 16794)
-- Name: tbl_gender; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_gender (
    id smallint NOT NULL,
    gendername character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    gendernshortame character varying(5)
);


ALTER TABLE public.tbl_gender OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 16792)
-- Name: tbl_gender_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_gender_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_gender_id_seq OWNER TO postgres;

--
-- TOC entry 3579 (class 0 OID 0)
-- Dependencies: 212
-- Name: tbl_gender_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_gender_id_seq OWNED BY public.tbl_gender.id;


--
-- TOC entry 239 (class 1259 OID 17602)
-- Name: tbl_job_posting; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_job_posting (
    id integer NOT NULL,
    postname character varying(50) NOT NULL,
    companyid smallint NOT NULL,
    designationid integer NOT NULL,
    nov smallint NOT NULL,
    localtion character varying(20) NOT NULL,
    jobdescription text NOT NULL,
    experience character varying(10) NOT NULL,
    responsibility text NOT NULL,
    startdate date,
    enddate date,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    CONSTRAINT tbl_job_posting_nov_check CHECK ((nov > '0'::smallint))
);


ALTER TABLE public.tbl_job_posting OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 17600)
-- Name: tbl_job_posting_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_job_posting_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_job_posting_id_seq OWNER TO postgres;

--
-- TOC entry 3580 (class 0 OID 0)
-- Dependencies: 238
-- Name: tbl_job_posting_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_job_posting_id_seq OWNED BY public.tbl_job_posting.id;


--
-- TOC entry 241 (class 1259 OID 17636)
-- Name: tbl_job_posting_qualification; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_job_posting_qualification (
    id integer NOT NULL,
    jpid integer NOT NULL,
    qualificationid integer NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_job_posting_qualification OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 17634)
-- Name: tbl_job_posting_qualification_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_job_posting_qualification_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_job_posting_qualification_id_seq OWNER TO postgres;

--
-- TOC entry 3581 (class 0 OID 0)
-- Dependencies: 240
-- Name: tbl_job_posting_qualification_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_job_posting_qualification_id_seq OWNED BY public.tbl_job_posting_qualification.id;


--
-- TOC entry 245 (class 1259 OID 17688)
-- Name: tbl_job_posting_skill; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_job_posting_skill (
    id integer NOT NULL,
    jpid integer NOT NULL,
    skillid integer NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_job_posting_skill OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 17686)
-- Name: tbl_job_posting_skill_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_job_posting_skill_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_job_posting_skill_id_seq OWNER TO postgres;

--
-- TOC entry 3582 (class 0 OID 0)
-- Dependencies: 244
-- Name: tbl_job_posting_skill_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_job_posting_skill_id_seq OWNED BY public.tbl_job_posting_skill.id;


--
-- TOC entry 215 (class 1259 OID 16816)
-- Name: tbl_marital_status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_marital_status (
    id smallint NOT NULL,
    statusname character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    statusnshortame character varying(5)
);


ALTER TABLE public.tbl_marital_status OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 16814)
-- Name: tbl_marital_status_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_marital_status_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_marital_status_id_seq OWNER TO postgres;

--
-- TOC entry 3583 (class 0 OID 0)
-- Dependencies: 214
-- Name: tbl_marital_status_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_marital_status_id_seq OWNED BY public.tbl_marital_status.id;


--
-- TOC entry 272 (class 1259 OID 34912)
-- Name: tbl_periodtype; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_periodtype (
    id integer NOT NULL,
    periodtype character varying(20) NOT NULL,
    entryby integer NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_periodtype OWNER TO postgres;

--
-- TOC entry 271 (class 1259 OID 34910)
-- Name: tbl_periodtype_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_periodtype_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_periodtype_id_seq OWNER TO postgres;

--
-- TOC entry 3584 (class 0 OID 0)
-- Dependencies: 271
-- Name: tbl_periodtype_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_periodtype_id_seq OWNED BY public.tbl_periodtype.id;


--
-- TOC entry 247 (class 1259 OID 17718)
-- Name: tbl_recruitment_application; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_recruitment_application (
    id integer NOT NULL,
    fname character varying(25) NOT NULL,
    mname character varying(15),
    lname character varying(15) NOT NULL,
    fathername character varying(30),
    mothername character varying(30),
    spousename character varying(30),
    dob date,
    maritalstatusid smallint,
    genderid smallint,
    religionid smallint,
    contact bigint NOT NULL,
    altcontact bigint,
    whatsapp bigint,
    email character varying(60),
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    CONSTRAINT tbl_recruitment_application_altcontact_check CHECK ((altcontact > '6000000000'::bigint)),
    CONSTRAINT tbl_recruitment_application_contact_check CHECK ((contact > '6000000000'::bigint))
);


ALTER TABLE public.tbl_recruitment_application OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 17716)
-- Name: tbl_recruitment_application_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_recruitment_application_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_recruitment_application_id_seq OWNER TO postgres;

--
-- TOC entry 3585 (class 0 OID 0)
-- Dependencies: 246
-- Name: tbl_recruitment_application_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_recruitment_application_id_seq OWNED BY public.tbl_recruitment_application.id;


--
-- TOC entry 237 (class 1259 OID 17580)
-- Name: tbl_religion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_religion (
    id smallint NOT NULL,
    religion character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_religion OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 17578)
-- Name: tbl_religion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_religion_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_religion_id_seq OWNER TO postgres;

--
-- TOC entry 3586 (class 0 OID 0)
-- Dependencies: 236
-- Name: tbl_religion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_religion_id_seq OWNED BY public.tbl_religion.id;


--
-- TOC entry 274 (class 1259 OID 34962)
-- Name: tbl_resource; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_resource (
    id integer NOT NULL,
    resourcetypeid smallint NOT NULL,
    companyid smallint,
    modelnumber character varying(50),
    serialnumber character varying(50),
    purchagingdate date,
    servicecenteraddress character varying(50),
    servicecentermobile bigint,
    assurancetypeid smallint,
    assuranceperiod integer,
    periodtypeid integer,
    assuranceexpired date,
    entryby integer NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_resource OWNER TO postgres;

--
-- TOC entry 268 (class 1259 OID 34755)
-- Name: tbl_resource_company; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_resource_company (
    id integer NOT NULL,
    companyname character varying(20) NOT NULL,
    comapnyshortname character varying(10) NOT NULL,
    entryby integer NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_resource_company OWNER TO postgres;

--
-- TOC entry 267 (class 1259 OID 34753)
-- Name: tbl_resource_company_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_resource_company_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_resource_company_id_seq OWNER TO postgres;

--
-- TOC entry 3587 (class 0 OID 0)
-- Dependencies: 267
-- Name: tbl_resource_company_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_resource_company_id_seq OWNED BY public.tbl_resource_company.id;


--
-- TOC entry 273 (class 1259 OID 34960)
-- Name: tbl_resource_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_resource_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_resource_id_seq OWNER TO postgres;

--
-- TOC entry 3588 (class 0 OID 0)
-- Dependencies: 273
-- Name: tbl_resource_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_resource_id_seq OWNED BY public.tbl_resource.id;


--
-- TOC entry 266 (class 1259 OID 34738)
-- Name: tbl_resource_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_resource_type (
    id integer NOT NULL,
    typename character varying(20) NOT NULL,
    typeshortname character varying(10) NOT NULL,
    entryby integer NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_resource_type OWNER TO postgres;

--
-- TOC entry 265 (class 1259 OID 34736)
-- Name: tbl_resource_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_resource_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_resource_type_id_seq OWNER TO postgres;

--
-- TOC entry 3589 (class 0 OID 0)
-- Dependencies: 265
-- Name: tbl_resource_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_resource_type_id_seq OWNED BY public.tbl_resource_type.id;


--
-- TOC entry 243 (class 1259 OID 17666)
-- Name: tbl_skill; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_skill (
    id integer NOT NULL,
    skill character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_skill OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 17664)
-- Name: tbl_skill_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_skill_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_skill_id_seq OWNER TO postgres;

--
-- TOC entry 3590 (class 0 OID 0)
-- Dependencies: 242
-- Name: tbl_skill_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_skill_id_seq OWNED BY public.tbl_skill.id;


--
-- TOC entry 203 (class 1259 OID 16656)
-- Name: tbl_state; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_state (
    id smallint NOT NULL,
    statename character varying(20) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    stateshortname character varying(10)
);


ALTER TABLE public.tbl_state OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16654)
-- Name: tbl_state_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_state_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_state_id_seq OWNER TO postgres;

--
-- TOC entry 3591 (class 0 OID 0)
-- Dependencies: 202
-- Name: tbl_state_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_state_id_seq OWNED BY public.tbl_state.id;


--
-- TOC entry 225 (class 1259 OID 16937)
-- Name: tbl_temp_employee; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_temp_employee (
    id smallint NOT NULL,
    slno integer NOT NULL,
    departmentmappingid integer NOT NULL,
    designationid smallint NOT NULL,
    doj date NOT NULL,
    dol date,
    empid character varying(20) NOT NULL,
    fname character varying(20) NOT NULL,
    mname character varying(20) DEFAULT NULL::character varying,
    lname character varying(20) NOT NULL,
    genderid smallint NOT NULL,
    mobile bigint NOT NULL,
    emailid character varying(60) DEFAULT NULL::character varying,
    fathername character varying(60) DEFAULT NULL::character varying,
    mothername character varying(60) DEFAULT NULL::character varying,
    maritalstatusid smallint,
    spousename character varying(60) DEFAULT NULL::character varying,
    educationid smallint NOT NULL,
    address character varying(200) DEFAULT NULL::character varying,
    districtid smallint,
    dob date,
    epfno character varying(30) DEFAULT NULL::character varying,
    esifno character varying(30) DEFAULT NULL::character varying,
    panno character varying(30) DEFAULT NULL::character varying,
    aadharno character varying(30) DEFAULT NULL::character varying,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    isqueue boolean DEFAULT false,
    isrejeted boolean DEFAULT false,
    isvalid boolean DEFAULT false,
    isattendance boolean DEFAULT false
);


ALTER TABLE public.tbl_temp_employee OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 16935)
-- Name: tbl_temp_employee_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_temp_employee_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_temp_employee_id_seq OWNER TO postgres;

--
-- TOC entry 3592 (class 0 OID 0)
-- Dependencies: 224
-- Name: tbl_temp_employee_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_temp_employee_id_seq OWNED BY public.tbl_temp_employee.id;


--
-- TOC entry 199 (class 1259 OID 16600)
-- Name: tbl_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_user (
    id integer NOT NULL,
    usertypeid smallint,
    fname character varying(60) NOT NULL,
    emailid character varying(60) NOT NULL,
    mobile bigint NOT NULL,
    dob date NOT NULL,
    logo character varying(14) DEFAULT NULL::character varying,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    username character varying(15),
    mname character varying(20),
    lname character varying(20),
    CONSTRAINT tbl_user_mobile_check CHECK ((mobile > '6000000000'::bigint))
);


ALTER TABLE public.tbl_user OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16621)
-- Name: tbl_user_authentication; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_user_authentication (
    id integer NOT NULL,
    userid smallint,
    password text NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_user_authentication OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16619)
-- Name: tbl_user_authentication_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_user_authentication_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_user_authentication_id_seq OWNER TO postgres;

--
-- TOC entry 3593 (class 0 OID 0)
-- Dependencies: 200
-- Name: tbl_user_authentication_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_user_authentication_id_seq OWNED BY public.tbl_user_authentication.id;


--
-- TOC entry 198 (class 1259 OID 16598)
-- Name: tbl_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_user_id_seq OWNER TO postgres;

--
-- TOC entry 3594 (class 0 OID 0)
-- Dependencies: 198
-- Name: tbl_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_user_id_seq OWNED BY public.tbl_user.id;


--
-- TOC entry 197 (class 1259 OID 16588)
-- Name: tbl_user_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_user_type (
    id smallint NOT NULL,
    typename character varying(30),
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true,
    usertypeshortname character varying(5)
);


ALTER TABLE public.tbl_user_type OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16586)
-- Name: tbl_user_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_user_type_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_user_type_id_seq OWNER TO postgres;

--
-- TOC entry 3595 (class 0 OID 0)
-- Dependencies: 196
-- Name: tbl_user_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_user_type_id_seq OWNED BY public.tbl_user_type.id;


--
-- TOC entry 233 (class 1259 OID 17172)
-- Name: tbl_year; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_year (
    id smallint NOT NULL,
    year character varying(15) NOT NULL,
    entryby integer NOT NULL,
    createdat timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updatedby integer,
    updatedat timestamp without time zone,
    isactive boolean DEFAULT true
);


ALTER TABLE public.tbl_year OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 17170)
-- Name: tbl_year_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_year_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_year_id_seq OWNER TO postgres;

--
-- TOC entry 3596 (class 0 OID 0)
-- Dependencies: 232
-- Name: tbl_year_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_year_id_seq OWNED BY public.tbl_year.id;


--
-- TOC entry 235 (class 1259 OID 17555)
-- Name: view_company; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.view_company AS
 SELECT c.id,
    c.companytypeid,
    c.companyname,
    c.companyshortname,
    c.establishedon,
    c.gstno,
    c.address,
    c.distid,
    c.pincode,
    c.url,
    c.emailid,
    c.mobile,
    tct.typename AS companytypename,
    tct.typeshortname AS companytypeshortname,
    td.distname,
    td.distshortname,
    td.stateid,
    ts.statename,
    ts.stateshortname,
    c.isactive
   FROM (((public.tbl_company c
     JOIN public.tbl_company_type tct ON ((c.companytypeid = tct.id)))
     JOIN public.tbl_district td ON ((c.distid = td.id)))
     JOIN public.tbl_state ts ON ((td.stateid = ts.id)));


ALTER TABLE public.view_company OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 17239)
-- Name: view_department_mapping; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.view_department_mapping AS
 SELECT tdm.id,
    tdm.companyid,
    tc.companyname,
    tdm.departmentid,
    td.departmentname,
    tdm.entryby,
    tdm.createdat,
    tdm.updatedby,
    tdm.updatedat,
    tdm.isactive
   FROM ((public.tbl_department_mapping tdm
     JOIN public.tbl_company tc ON ((tdm.companyid = tc.id)))
     JOIN public.tbl_department td ON ((tdm.departmentid = td.id)));


ALTER TABLE public.view_department_mapping OWNER TO postgres;

--
-- TOC entry 261 (class 1259 OID 18131)
-- Name: view_employee_bank_details; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.view_employee_bank_details AS
 SELECT tebd.id,
    tebd.empid,
    tte.fname,
    tte.mname,
    tte.lname,
    tebd.bankid,
    tbn.bankname,
    tbn.bankshortname,
    tebd.acno,
    tebd.ifsccode,
    tebd.entryby,
    tebd.createdat,
    tebd.updatedby,
    tebd.updatedat,
    tebd.isactive
   FROM ((public.tbl_employee_bank_details tebd
     JOIN public.tbl_temp_employee tte ON ((tebd.empid = tte.id)))
     JOIN public.tbl_bank_name tbn ON ((tebd.bankid = tbn.id)));


ALTER TABLE public.view_employee_bank_details OWNER TO postgres;

--
-- TOC entry 255 (class 1259 OID 17991)
-- Name: view_job_posting; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.view_job_posting AS
 SELECT jp.id,
    jp.companyid,
    tc.companyname,
    jp.postname,
    jp.designationid,
    td.designationname,
    jp.nov,
    jp.localtion,
    jp.jobdescription,
    jp.experience AS experiancename,
    jp.responsibility,
    jp.startdate,
    jp.enddate,
    tjpq.qualificationid,
    te.educationname,
    tjps.skillid,
    ts.skill,
    jp.createdat,
    jp.updatedby,
    jp.createdat AS updatedat,
    jp.isactive
   FROM ((((((public.tbl_job_posting jp
     JOIN public.tbl_job_posting_qualification tjpq ON ((jp.id = tjpq.jpid)))
     JOIN public.tbl_job_posting_skill tjps ON ((jp.id = tjps.jpid)))
     JOIN public.tbl_education te ON ((tjpq.qualificationid = te.id)))
     JOIN public.tbl_skill ts ON ((tjps.skillid = ts.id)))
     JOIN public.tbl_designation td ON ((jp.designationid = td.id)))
     JOIN public.tbl_company tc ON ((jp.companyid = tc.id)));


ALTER TABLE public.view_job_posting OWNER TO postgres;

--
-- TOC entry 260 (class 1259 OID 18096)
-- Name: view_recruitment_application; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.view_recruitment_application AS
 SELECT tra.id,
    tra.fname,
    tra.mname,
    tra.lname,
    tra.fathername,
    tra.mothername,
    tra.spousename,
    tra.dob,
    tra.maritalstatusid,
    tms.statusname,
    tra.genderid,
    tg.gendername,
    tra.religionid,
    tr.religion,
    tra.contact,
    tra.altcontact,
    tra.whatsapp,
    tra.email,
    tcd.at,
    tcd.po,
    tcd.ps,
    tcd.pincode,
    tcd.commtid AS commitid,
    tct.type AS ctype,
    td.stateid,
    ts.statename,
    tcd.dist AS distid,
    td.distname,
    taq.orgname,
    taq.board AS boad,
    taq.examname,
    taq.yop,
    taq.totalmark,
    taq.securedmark,
    tawe.etid AS exetypeid,
    tet.type AS exetypename,
    tawe.providedby AS companyname,
    tawe.startdate AS doj,
    tawe.enddate AS dol,
    tawe.role,
    tawe.remark,
    tra.entryby,
    tra.createdat,
    tra.updatedby,
    tra.updatedat,
    tra.isactive
   FROM ((((((((((public.tbl_recruitment_application tra
     LEFT JOIN public.tbl_communication_details tcd ON ((tra.id = tcd.apid)))
     LEFT JOIN public.tbl_applicant_qualification taq ON ((tra.id = taq.apid)))
     LEFT JOIN public.tbl_applicant_work_experiance tawe ON ((tra.id = tawe.apid)))
     LEFT JOIN public.tbl_district td ON ((tcd.dist = td.id)))
     LEFT JOIN public.tbl_state ts ON ((td.stateid = ts.id)))
     LEFT JOIN public.tbl_marital_status tms ON ((tra.maritalstatusid = tms.id)))
     LEFT JOIN public.tbl_gender tg ON ((tra.genderid = tg.id)))
     LEFT JOIN public.tbl_religion tr ON ((tra.religionid = tr.id)))
     LEFT JOIN public.tbl_communication_type tct ON ((tcd.commtid = tct.id)))
     LEFT JOIN public.tbl_experiance_type tet ON ((tawe.etid = tet.id)));


ALTER TABLE public.view_recruitment_application OWNER TO postgres;

--
-- TOC entry 275 (class 1259 OID 43246)
-- Name: view_resource; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.view_resource AS
 SELECT tr.id,
    trt.typename,
    trt.typeshortname,
    trc.id AS companyid,
    trc.companyname,
    trc.comapnyshortname,
    tr.modelnumber,
    tr.serialnumber,
    tr.purchagingdate,
    tr.servicecenteraddress,
    tr.servicecentermobile,
    ta.id AS assuranceid,
    ta.assurance,
    tp.id AS periodid,
    tp.periodtype,
    tr.assuranceexpired,
    tr.entryby,
    tr.createdat,
    tr.updatedby,
    tr.updatedat,
    tr.isactive
   FROM ((((public.tbl_resource tr
     LEFT JOIN public.tbl_resource_type trt ON ((tr.resourcetypeid = trt.id)))
     LEFT JOIN public.tbl_resource_company trc ON ((tr.companyid = trc.id)))
     LEFT JOIN public.tbl_assurance ta ON ((tr.assurancetypeid = ta.id)))
     LEFT JOIN public.tbl_periodtype tp ON ((tr.periodtypeid = tp.id)));


ALTER TABLE public.view_resource OWNER TO postgres;

--
-- TOC entry 280 (class 1259 OID 43353)
-- Name: view_temp_employee; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.view_temp_employee AS
 SELECT tte.id,
    tte.slno,
    tte.fname,
    tte.mname,
    tte.lname,
    tte.departmentmappingid,
    tte.dob,
    tte.mobile,
    tte.emailid,
    tte.aadharno,
    tte.address,
    tte.createdat,
    tte.designationid,
    tte.districtid,
    tdst.distname AS districtname,
    tdst.stateid AS statid,
    ts.statename,
    tte.doj,
    tte.dol,
    tte.educationid,
    tte.empid,
    tte.epfno,
    tte.esifno,
    tte.fathername,
    tte.genderid,
    tte.mothername,
    tte.maritalstatusid,
    tte.panno,
    tte.spousename,
    tte.updatedat,
    tte.updatedby,
    tte.entryby,
    tdg.designationname,
    tg.gendername,
    tms.statusname,
    te.educationname,
    tc.companyname,
    tte.isactive,
    tte.isattendance
   FROM ((((((((public.tbl_temp_employee tte
     JOIN public.tbl_department_mapping tdm ON ((tte.departmentmappingid = tdm.id)))
     JOIN public.tbl_designation tdg ON ((tte.designationid = tdg.id)))
     JOIN public.tbl_gender tg ON ((tte.genderid = tg.id)))
     JOIN public.tbl_marital_status tms ON ((tte.maritalstatusid = tms.id)))
     JOIN public.tbl_district tdst ON ((tte.districtid = tdst.id)))
     JOIN public.tbl_education te ON ((tte.educationid = te.id)))
     JOIN public.tbl_state ts ON ((tdst.stateid = ts.id)))
     JOIN public.tbl_company tc ON ((tdm.companyid = tc.id)));


ALTER TABLE public.view_temp_employee OWNER TO postgres;

--
-- TOC entry 262 (class 1259 OID 18139)
-- Name: view_user; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.view_user AS
 SELECT u.id,
    u.usertypeid,
    ut.typename,
    u.fname AS name,
    u.mname,
    u.lname,
    u.emailid,
    u.mobile,
    u.dob,
    u.logo,
    u.isactive,
    u.username,
    tua.password,
    tua.isactive AS authisactive,
    ut.isactive AS typeisactive
   FROM ((public.tbl_user u
     JOIN public.tbl_user_type ut ON ((u.usertypeid = ut.id)))
     JOIN public.tbl_user_authentication tua ON ((u.id = tua.userid)));


ALTER TABLE public.view_user OWNER TO postgres;

--
-- TOC entry 3035 (class 2604 OID 17758)
-- Name: tbl_applicant_qualification id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_qualification ALTER COLUMN id SET DEFAULT nextval('public.tbl_applicant_qualification_id_seq'::regclass);


--
-- TOC entry 3050 (class 2604 OID 18044)
-- Name: tbl_applicant_work_experiance id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_work_experiance ALTER COLUMN id SET DEFAULT nextval('public.tbl_applicant_work_experiance_id_seq'::regclass);


--
-- TOC entry 3063 (class 2604 OID 34773)
-- Name: tbl_assurance id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_assurance ALTER COLUMN id SET DEFAULT nextval('public.tbl_assurance_id_seq'::regclass);


--
-- TOC entry 3078 (class 2604 OID 43386)
-- Name: tbl_attendance id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_attendance ALTER COLUMN id SET DEFAULT nextval('public.tbl_attendance_id_seq'::regclass);


--
-- TOC entry 3054 (class 2604 OID 34689)
-- Name: tbl_attendance_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_attendance_type ALTER COLUMN id SET DEFAULT nextval('public.tbl_attendance_type_id_seq'::regclass);


--
-- TOC entry 3005 (class 2604 OID 17088)
-- Name: tbl_bank_name id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_bank_name ALTER COLUMN id SET DEFAULT nextval('public.tbl_bank_name_id_seq'::regclass);


--
-- TOC entry 3047 (class 2604 OID 18004)
-- Name: tbl_communication_details id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_details ALTER COLUMN id SET DEFAULT nextval('public.tbl_communication_details_id_seq'::regclass);


--
-- TOC entry 3045 (class 2604 OID 17919)
-- Name: tbl_communication_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_type ALTER COLUMN id SET DEFAULT nextval('public.tbl_communication_type_id_seq'::regclass);


--
-- TOC entry 2957 (class 2604 OID 16730)
-- Name: tbl_company id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company ALTER COLUMN id SET DEFAULT nextval('public.tbl_company_id_seq'::regclass);


--
-- TOC entry 2954 (class 2604 OID 16708)
-- Name: tbl_company_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company_type ALTER COLUMN id SET DEFAULT nextval('public.tbl_company_type_id_seq'::regclass);


--
-- TOC entry 3075 (class 2604 OID 43323)
-- Name: tbl_datemanagement id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_datemanagement ALTER COLUMN id SET DEFAULT nextval('public.tbl_datemanagement_id_seq'::regclass);


--
-- TOC entry 3072 (class 2604 OID 43308)
-- Name: tbl_datetype id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_datetype ALTER COLUMN id SET DEFAULT nextval('public.tbl_datetype_id_seq'::regclass);


--
-- TOC entry 2974 (class 2604 OID 16863)
-- Name: tbl_department id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department ALTER COLUMN id SET DEFAULT nextval('public.tbl_department_id_seq'::regclass);


--
-- TOC entry 2980 (class 2604 OID 16908)
-- Name: tbl_department_mapping id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department_mapping ALTER COLUMN id SET DEFAULT nextval('public.tbl_department_mapping_id_seq'::regclass);


--
-- TOC entry 2977 (class 2604 OID 16886)
-- Name: tbl_designation id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_designation ALTER COLUMN id SET DEFAULT nextval('public.tbl_designation_id_seq'::regclass);


--
-- TOC entry 2951 (class 2604 OID 16681)
-- Name: tbl_district id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_district ALTER COLUMN id SET DEFAULT nextval('public.tbl_district_id_seq'::regclass);


--
-- TOC entry 2971 (class 2604 OID 16841)
-- Name: tbl_education id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_education ALTER COLUMN id SET DEFAULT nextval('public.tbl_education_id_seq'::regclass);


--
-- TOC entry 3000 (class 2604 OID 17012)
-- Name: tbl_employee id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee ALTER COLUMN id SET DEFAULT nextval('public.tbl_employee_id_seq'::regclass);


--
-- TOC entry 3008 (class 2604 OID 17110)
-- Name: tbl_employee_bank_details id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_bank_details ALTER COLUMN id SET DEFAULT nextval('public.tbl_employee_bank_details_id_seq'::regclass);


--
-- TOC entry 2962 (class 2604 OID 16775)
-- Name: tbl_employee_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_type ALTER COLUMN id SET DEFAULT nextval('public.tbl_employee_type_id_seq'::regclass);


--
-- TOC entry 3041 (class 2604 OID 17893)
-- Name: tbl_experiance_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_experiance_type ALTER COLUMN id SET DEFAULT nextval('public.tbl_experiance_type_id_seq1'::regclass);


--
-- TOC entry 2965 (class 2604 OID 16797)
-- Name: tbl_gender id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_gender ALTER COLUMN id SET DEFAULT nextval('public.tbl_gender_id_seq'::regclass);


--
-- TOC entry 3017 (class 2604 OID 17605)
-- Name: tbl_job_posting id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting ALTER COLUMN id SET DEFAULT nextval('public.tbl_job_posting_id_seq'::regclass);


--
-- TOC entry 3021 (class 2604 OID 17639)
-- Name: tbl_job_posting_qualification id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_qualification ALTER COLUMN id SET DEFAULT nextval('public.tbl_job_posting_qualification_id_seq'::regclass);


--
-- TOC entry 3027 (class 2604 OID 17691)
-- Name: tbl_job_posting_skill id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_skill ALTER COLUMN id SET DEFAULT nextval('public.tbl_job_posting_skill_id_seq'::regclass);


--
-- TOC entry 2968 (class 2604 OID 16819)
-- Name: tbl_marital_status id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_marital_status ALTER COLUMN id SET DEFAULT nextval('public.tbl_marital_status_id_seq'::regclass);


--
-- TOC entry 3066 (class 2604 OID 34915)
-- Name: tbl_periodtype id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_periodtype ALTER COLUMN id SET DEFAULT nextval('public.tbl_periodtype_id_seq'::regclass);


--
-- TOC entry 3030 (class 2604 OID 17721)
-- Name: tbl_recruitment_application id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_recruitment_application ALTER COLUMN id SET DEFAULT nextval('public.tbl_recruitment_application_id_seq'::regclass);


--
-- TOC entry 3014 (class 2604 OID 17583)
-- Name: tbl_religion id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_religion ALTER COLUMN id SET DEFAULT nextval('public.tbl_religion_id_seq'::regclass);


--
-- TOC entry 3069 (class 2604 OID 34965)
-- Name: tbl_resource id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource ALTER COLUMN id SET DEFAULT nextval('public.tbl_resource_id_seq'::regclass);


--
-- TOC entry 3060 (class 2604 OID 34758)
-- Name: tbl_resource_company id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource_company ALTER COLUMN id SET DEFAULT nextval('public.tbl_resource_company_id_seq'::regclass);


--
-- TOC entry 3058 (class 2604 OID 34741)
-- Name: tbl_resource_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource_type ALTER COLUMN id SET DEFAULT nextval('public.tbl_resource_type_id_seq'::regclass);


--
-- TOC entry 3024 (class 2604 OID 17669)
-- Name: tbl_skill id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_skill ALTER COLUMN id SET DEFAULT nextval('public.tbl_skill_id_seq'::regclass);


--
-- TOC entry 2948 (class 2604 OID 16659)
-- Name: tbl_state id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_state ALTER COLUMN id SET DEFAULT nextval('public.tbl_state_id_seq'::regclass);


--
-- TOC entry 2983 (class 2604 OID 16940)
-- Name: tbl_temp_employee id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee ALTER COLUMN id SET DEFAULT nextval('public.tbl_temp_employee_id_seq'::regclass);


--
-- TOC entry 2940 (class 2604 OID 16603)
-- Name: tbl_user id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user ALTER COLUMN id SET DEFAULT nextval('public.tbl_user_id_seq'::regclass);


--
-- TOC entry 2945 (class 2604 OID 16624)
-- Name: tbl_user_authentication id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user_authentication ALTER COLUMN id SET DEFAULT nextval('public.tbl_user_authentication_id_seq'::regclass);


--
-- TOC entry 2937 (class 2604 OID 16591)
-- Name: tbl_user_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user_type ALTER COLUMN id SET DEFAULT nextval('public.tbl_user_type_id_seq'::regclass);


--
-- TOC entry 3011 (class 2604 OID 17175)
-- Name: tbl_year id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_year ALTER COLUMN id SET DEFAULT nextval('public.tbl_year_id_seq'::regclass);


--
-- TOC entry 3522 (class 0 OID 17755)
-- Dependencies: 249
-- Data for Name: tbl_applicant_qualification; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_applicant_qualification (id, apid, orgname, board, examname, yop, totalmark, securedmark, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
69	99	jupiter	matriculater	garudation	2015	3500	2001	23	2019-10-14 14:02:00	\N	\N	t
67	96	Javatech	java	btche	2012	2800	1985	23	2019-10-03 18:21:55	\N	2019-10-15 11:21:06	t
70	102	BEd	BEd	BeD	2012	2800	2500	23	2019-10-15 14:29:29	\N	\N	t
68	97	Ignou	Ignou	MCA	2010	2800	1789	23	2019-10-05 12:41:03	23	2019-11-19 14:18:55	t
71	103	werqwer	qwerwer	werqwer	2431	2342	2111	23	2019-11-19 18:03:16	\N	\N	t
\.


--
-- TOC entry 3531 (class 0 OID 18041)
-- Dependencies: 259
-- Data for Name: tbl_applicant_work_experiance; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_applicant_work_experiance (id, apid, etid, providedby, startdate, enddate, role, remark, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
52	99	4	wipro softer	2019-10-22	2019-10-25	Developre	good	23	2019-10-14 14:04:28	\N	\N	t
50	96	3		2019-10-27	2019-10-31	Student project	good	23	2019-10-03 18:22:20	\N	2019-10-15 11:21:25	t
53	102	3	Wipro	2015-02-12	2019-10-07	Admin	Excellent	23	2019-10-15 14:30:25	\N	\N	t
51	97	3		2011-10-08	2014-10-26	Developer	Excelent	23	2019-10-05 12:41:45	23	2019-11-19 14:19:02	t
54	103	4	werqwer	1925-11-12	2015-11-12	qwerwe	geee	23	2019-11-19 18:03:50	\N	\N	t
\.


--
-- TOC entry 3539 (class 0 OID 34770)
-- Dependencies: 270
-- Data for Name: tbl_assurance; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_assurance (id, assurance, entryby, updatedby, updatedat, createdat, isactive) FROM stdin;
4	LifeTime	23	\N	\N	2019-11-07 11:43:46	t
1	warrenty	23	23	2019-11-21 14:37:40	2019-11-01 13:51:12	t
3	No Condition	23	23	2019-11-21 14:37:41	2019-11-07 11:43:30	t
2	Guareenty	23	23	2019-11-21 14:37:42	2019-11-01 13:53:31	t
6	Unlimited	23	\N	\N	2019-11-21 17:07:38	t
5	Undefined	23	23	2019-11-21 17:12:11	2019-11-10 17:26:53	t
7	Not Fined	23	\N	\N	2019-11-21 17:12:25	t
\.


--
-- TOC entry 3549 (class 0 OID 43383)
-- Dependencies: 282
-- Data for Name: tbl_attendance; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_attendance (id, empid, date, status, intime, outtime, entryby, updatedby, updatedat, createdat, isactive) FROM stdin;
67	55	2019-12-29	\N	17:24:48	\N	23	\N	\N	2019-12-29 17:24:48	t
68	58	2019-12-29	\N	17:24:49	\N	23	\N	\N	2019-12-29 17:24:49	t
69	51	2019-12-29	\N	17:24:49	\N	23	\N	\N	2019-12-29 17:24:49	t
70	50	2019-12-29	\N	17:24:50	\N	23	\N	\N	2019-12-29 17:24:50	t
71	56	2019-12-29	\N	17:24:51	\N	23	\N	\N	2019-12-29 17:24:51	t
72	57	2019-12-29	\N	17:29:31	\N	23	\N	\N	2019-12-29 17:29:31	t
66	55	2019-12-29	\N	16:28:06	17:29:39	23	\N	\N	2019-12-29 16:28:06	t
73	55	2020-01-01	\N	14:51:34	14:51:37	23	\N	\N	2020-01-01 14:51:34	t
\.


--
-- TOC entry 3533 (class 0 OID 34686)
-- Dependencies: 264
-- Data for Name: tbl_attendance_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_attendance_type (id, typename, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
3	Half day	23	2019-10-25 12:02:41	\N	\N	t
1	Present	23	2019-10-25 12:01:50	23	2019-10-25 12:06:33	t
2	Absent	23	2019-10-25 12:02:27	23	2019-10-25 12:06:34	t
4	work from home	23	2019-10-25 14:56:37	\N	\N	t
5	leave	23	2019-10-25 14:56:43	\N	\N	t
6	abcdef	23	2019-12-28 00:07:37	\N	\N	t
\.


--
-- TOC entry 3504 (class 0 OID 17085)
-- Dependencies: 229
-- Data for Name: tbl_bank_name; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_bank_name (id, bankname, entryby, createdat, updatedby, updatedat, isactive, bankshortname) FROM stdin;
41	testings	23	2019-08-30 17:39:41	23	2019-11-16 13:19:21	f	tests
42	testing twos	23	2019-08-30 17:41:19	23	2019-11-16 13:20:56	f	twos
43	OBC Bank	23	2019-10-17 14:42:53	23	2019-11-16 13:22:25	t	obc
49	Corporation Banks	23	2019-11-20 11:54:34	23	2019-11-20 11:54:44	t	CBank
50	Ladakh Gramya Bank	23	2019-11-21 17:28:49	\N	\N	t	ladak
48	Karnataka Gramya Bank	23	2019-10-17 14:56:18	23	2019-11-21 17:29:19	f	KGB
51	adasd	23	2019-12-28 16:00:25	\N	\N	t	lasdf
\.


--
-- TOC entry 3529 (class 0 OID 18001)
-- Dependencies: 257
-- Data for Name: tbl_communication_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_communication_details (id, apid, at, po, ps, landmark, dist, state, pincode, commtid, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
99	99	palbandh	palbandh	palbandh	back side of pond	27	21	752005	2	23	2019-10-14 13:59:56	\N	\N	t
97	96	Santa clause	Punjab	Punjab		28	21	986598	1	23	2019-10-03 18:21:25	\N	2019-10-15 11:20:51	t
100	100	kjpur	kjpuf	kjpupur		8	18	752011	2	23	2019-10-14 14:18:14	23	2019-10-15 14:14:03	t
101	102	Birapratappur	Chandanpur	chandanpur	new Film hall	2	16	752012	1	23	2019-10-15 14:28:39	\N	\N	t
98	97	Samagadia	Ibirisign	Bhadrak		28	21	985632	1	23	2019-10-05 12:40:24	23	2019-11-19 14:18:47	t
102	103	asdfasd	asdfasd	asdfasd	asdfasd	2	16	634523	1	23	2019-11-19 18:02:48	\N	\N	t
\.


--
-- TOC entry 3527 (class 0 OID 17916)
-- Dependencies: 254
-- Data for Name: tbl_communication_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_communication_type (id, type, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
1	Email	23	2019-09-09 18:22:09	23	2019-09-09 18:22:26	t
2	By Post	23	2019-10-14 12:42:26	\N	\N	t
3	Phone Call	23	2019-10-14 12:42:36	\N	\N	t
\.


--
-- TOC entry 3484 (class 0 OID 16727)
-- Dependencies: 209
-- Data for Name: tbl_company; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_company (id, companytypeid, companyname, companyshortname, establishedon, gstno, address, distid, pincode, logo, url, emailid, mobile, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
27	1	TCS service	tcs	2019-12-15	24ASDFASDFASDFA	bbsres	4	752012	\N	adbcdalk.com	abcd@gmail.com	9778589887	23	2019-12-28 19:03:55	\N	\N	t
28	1	Cognizent	Cog	2009-12-07	24FALSDJFLASDLF	Baripada	3	798789	\N	cognizent.com	support@gmail.com	9778050495	23	2019-12-28 23:20:03	\N	\N	t
1	3	Atreya Associates	Atrey	2018-06-04	434123412342323	Crp Square Bhubaneswar	1	750124	\N	www.atreyaassociates.com	support@areya.com	7600979733	1	2019-08-26 13:57:36	\N	\N	t
3	2	Swadesh	swade	2018-07-20	242423452345234	nayapolly	2	985698	\N	www.swadeshinfra.com	swadeshinfra@support.com	7895685985	1	2019-08-26 15:43:40	\N	\N	t
16	2	Wipro Infotech	WIPRO	1988-05-02	23ALSDKDSDF2323	Mumbai, maharastra	5	858585	\N	wiproinfo.com	info.support@wipro.com	9861234567	1	2019-08-29 16:50:56	21	2019-08-29 16:52:19	f
15	1	vgjdf	seerw	2019-08-13	34ASFASDFA3453S	vasrtqwer	2	435234	\N	asfasasdas.dfg	asfasd@dsfsd.dff	9754635634	1	2019-08-27 14:15:02	23	2019-08-31 13:34:19	f
2	1	Tenvent	TenVt	2018-08-05	523452345234523	crp square 8number crp	3	752014	\N	www.tentvent.com	support@tentvent.com	9861356989	1	2019-08-26 15:36:40	23	2019-08-31 13:34:19	f
18	1	Orpat	Orpat	1985-05-01	45DLADS43DDF34D	Mumbai, maharastra	8	956820	\N	orpat.com	info@orpat.com	9238841015	23	2019-08-31 11:27:00	23	2019-08-31 13:34:20	f
17	1	Hero Group	Hero	2015-05-02	23STGKPLM34434D	Gugnani Motors Bhubaneswar 	2	751415	\N	heromotogroup.com	info@herogroup.com	9090498086	23	2019-08-31 11:16:58	1	2019-08-31 14:01:26	t
14	1	asfasdfree	TCS	2019-08-12	23FASDFAS423452	asdfasdfxsdd a  werqwerq	2	752001	\N	tcs.com	support@tcs.com	9238850151	1	2019-08-27 14:10:08	1	2019-08-31 14:09:27	t
19	1	bcded	adfas	2019-12-23	34ALDKFJLASDJFL	ctcabcd	5	987979	\N	adbsdadk.com	aldfa@ALFA.COM	9797979879	23	2019-12-28 16:38:03	\N	\N	t
20	3	MNADFA	ASDFA	2019-12-01	54ASDFASDFASDFA	CTALDKF	1	987989	\N	ASDFAS.SDF	ASDFA@ADSFJ.COM	7989898979	23	2019-12-28 16:40:30	\N	\N	t
23	2	DASDFASDF	ERDFA	2019-12-23	234ASDFASDFASDF	ADSFASD	5	234523	\N	AFASADS.DSD	ALSDF@ASLD.COM	9879898798	23	2019-12-28 16:43:27	\N	\N	t
\.


--
-- TOC entry 3482 (class 0 OID 16705)
-- Dependencies: 207
-- Data for Name: tbl_company_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_company_type (id, typename, entryby, createdat, updatedby, updatedat, isactive, typeshortname) FROM stdin;
42	sdfsd	23	2019-08-30 19:58:38	23	2019-08-30 19:58:46	f	sdd
1	Private	1	2019-08-26 12:49:05	1	2019-08-31 11:12:45	t	Pvt
2	Public	1	2019-08-26 13:49:21	1	2019-08-31 11:13:13	t	Puc
3	Trust	1	2019-08-26 13:49:26	1	2019-08-31 11:14:11	t	trst
45	Success	23	2019-10-18 16:52:23	1	2019-10-18 16:52:32	t	scrr
46	asdfa	23	2019-11-19 18:17:20	\N	\N	t	dfasd
47	semi government	23	2019-12-13 11:02:13	\N	\N	t	sg
\.


--
-- TOC entry 3547 (class 0 OID 43320)
-- Dependencies: 279
-- Data for Name: tbl_datemanagement; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_datemanagement (id, date, datetype, entryby, updatedby, updatedat, createdat, isactive) FROM stdin;
3	2019-12-31	1	23	\N	\N	2019-12-29 23:58:29	t
4	2019-12-28	1	23	\N	\N	2019-12-29 23:58:41	t
2	2019-12-30	1	23	\N	\N	2019-12-29 23:58:21	t
5	2019-12-25	1	23	\N	\N	2019-12-31 11:38:03	t
6	2019-12-27	1	23	\N	\N	2019-12-27 11:40:57	t
7	2019-12-24	1	23	\N	\N	2019-12-24 11:45:55	t
8	2019-12-22	1	23	\N	\N	2019-12-22 12:52:58	t
1	2019-12-29	1	23	\N	\N	2019-12-29 23:29:21	t
9	2020-01-01	1	23	\N	\N	2020-01-01 14:50:47	t
\.


--
-- TOC entry 3545 (class 0 OID 43305)
-- Dependencies: 277
-- Data for Name: tbl_datetype; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_datetype (id, name, entryby, updatedby, updatedat, createdat, isactive) FROM stdin;
1	Working Day	1	\N	\N	2019-12-29 17:27:03.102132	t
2	Holiday	1	\N	\N	2019-12-29 17:34:08.742161	t
3	Halfday	1	\N	\N	2019-12-29 17:34:08.742161	t
4	Sunday	1	\N	\N	2019-12-29 17:34:08.742161	t
\.


--
-- TOC entry 3494 (class 0 OID 16860)
-- Dependencies: 219
-- Data for Name: tbl_department; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_department (id, departmentname, entryby, createdat, updatedby, updatedat, isactive, departmentshortname) FROM stdin;
1	Tehnical	1	2019-08-26 13:00:16	23	2019-08-30 19:29:39	f	\N
3	BPO	1	2019-08-26 13:00:31	23	2019-08-30 19:29:39	t	\N
2	Call Center	1	2019-08-26 13:00:27	23	2019-08-30 19:29:37	t	CC
4	Marketing	1	2019-08-26 13:00:34	23	2019-11-06 22:42:49	t	marks
13	Artificial Inteligen	23	2019-11-21 17:45:11	\N	\N	t	AI
12	Company Cirtificate	23	2019-10-18 17:19:20	23	2019-11-21 17:45:44	f	CCert
\.


--
-- TOC entry 3498 (class 0 OID 16905)
-- Dependencies: 223
-- Data for Name: tbl_department_mapping; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_department_mapping (id, departmentid, companyid, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
28	3	1	23	2019-09-11 15:41:50	\N	\N	t
31	3	3	23	2019-10-18 18:28:19	\N	\N	t
34	4	1	23	2019-10-18 18:28:52	\N	\N	t
25	2	16	21	2019-08-29 16:58:30	21	2019-08-29 16:59:33	t
\.


--
-- TOC entry 3496 (class 0 OID 16883)
-- Dependencies: 221
-- Data for Name: tbl_designation; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_designation (id, designationname, entryby, createdat, updatedby, updatedat, isactive, designationshortname) FROM stdin;
11	Jr Developer	1	2019-08-26 13:10:59	1	2019-08-26 13:22:01	t	\N
12	Data Analysists	1	2019-08-26 13:11:53	23	2019-08-30 18:43:03	t	das
9	Full Stack Developer	1	2019-08-26 13:10:41	23	2019-08-30 19:28:44	f	FSTD
14	Junior	23	2019-08-30 19:32:04	\N	\N	t	clk
8	Team Leaders	1	2019-08-26 13:10:27	21	2019-08-29 18:11:36	t	\N
10	Sr Developer	1	2019-08-26 13:10:52	21	2019-08-29 18:11:54	f	\N
13	Office Staffs	1	2019-08-26 13:16:21	23	2019-08-31 14:10:38	t	OS
15	junior	23	2019-10-18 17:43:19	\N	\N	t	jnr
17	Coordinator	23	2019-10-18 17:52:46	23	2019-10-18 17:52:53	t	cdrs
18	Office maid	23	2019-11-20 12:53:45	23	2019-11-20 12:53:58	t	peon
\.


--
-- TOC entry 3480 (class 0 OID 16678)
-- Dependencies: 205
-- Data for Name: tbl_district; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_district (id, stateid, distname, entryby, createdat, updatedby, updatedat, isactive, distshortname) FROM stdin;
12	20	Jaipur	1	2019-08-25 19:30:22	\N	\N	t	\N
4	16	Bhubaneswar	1	2019-08-25 19:26:36	\N	\N	t	\N
10	19	Waynad	1	2019-08-25 19:29:19	\N	\N	t	\N
3	16	Puri	1	2019-08-25 19:26:28	\N	\N	t	\N
9	19	Thiruantapuram	1	2019-08-25 19:29:12	\N	\N	t	\N
2	16	Cuttack	1	2019-08-25 19:26:21	\N	\N	t	\N
8	18	Bhatinda	1	2019-08-25 19:28:54	\N	\N	t	\N
1	16	Baleswar	1	2019-08-25 19:26:09	\N	\N	t	\N
11	20	Jodhpur	1	2019-08-25 19:30:17	\N	\N	t	\N
7	18	Amritsar	1	2019-08-25 19:28:46	\N	\N	t	\N
6	18	Ludhiana	1	2019-08-25 19:28:11	\N	\N	t	\N
13	16	Baripada	1	2019-08-26 11:26:58	1	2019-08-26 11:27:13	t	\N
5	17	Calcutta	1	2019-08-25 19:27:16	\N	\N	t	\N
26	16	Mayurbhanj	23	2019-08-30 13:50:24	23	2019-08-30 17:44:05	t	May
27	21	Titukorin	23	2019-08-30 17:53:51	\N	\N	t	titu
28	21	titukorin	23	2019-08-30 17:54:07	\N	\N	t	titu
29	20	Thar	23	2019-08-30 17:54:45	\N	\N	t	thar
30	22	aruna	23	2019-08-30 17:56:00	23	2019-08-30 17:56:15	t	aps
31	27	dispur	23	2019-10-16 18:49:22	\N	\N	t	ds
32	27	panaji	23	2019-10-16 18:49:42	\N	\N	t	png
33	18	east punjab	23	2019-10-16 18:52:12	\N	\N	t	ep
34	16	Ganjam	23	2019-10-16 18:53:50	\N	\N	t	gnj
35	16	Gunpur	23	2019-10-16 18:54:12	23	2019-10-16 19:00:27	t	gng
36	23	Koraimana	23	2019-11-18 13:55:09	\N	\N	t	karai
37	33	qwerfasd	23	2019-12-09 17:11:38	\N	\N	t	xcvx
\.


--
-- TOC entry 3492 (class 0 OID 16838)
-- Dependencies: 217
-- Data for Name: tbl_education; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_education (id, educationname, entryby, createdat, updatedby, updatedat, isactive, educationshortname) FROM stdin;
11	Intermediate	1	2019-08-25 19:32:15	\N	\N	t	\N
12	Graduate	1	2019-08-25 19:32:19	\N	\N	t	\N
13	BCA	1	2019-08-25 19:32:23	\N	\N	t	\N
14	MCA	1	2019-08-25 19:32:25	\N	\N	t	\N
15	BBA	1	2019-08-25 19:32:27	\N	\N	t	\N
16	MBA	1	2019-08-25 19:32:29	\N	\N	t	\N
18	MTECH	1	2019-08-25 19:32:38	\N	\N	t	\N
17	BTECH	1	2019-08-25 19:32:34	1	2019-08-26 11:35:35	t	\N
19	Ninth	23	2019-08-30 14:01:21	\N	\N	t	nine
22	10th Standards	23	2019-08-30 14:13:26	23	2019-08-30 14:13:36	t	10th
20	Tenth	23	2019-08-30 14:09:17	23	2019-08-30 17:45:37	t	then
10	Matriculate	1	2019-08-25 19:32:06	23	2019-08-30 17:45:56	t	10ths
25	PGDCA	23	2019-10-17 11:43:34	23	2019-10-17 11:43:50	f	pga
24	BCAAa	23	2019-10-17 11:42:00	23	2019-10-17 11:43:51	f	Bca
21	Sipence	23	2019-08-30 14:12:58	23	2019-10-17 11:55:13	t	sdf
23	Degree	23	2019-10-17 11:41:05	23	2019-10-17 12:08:39	t	dgr
26	Nurshing	23	2019-11-19 18:16:37	23	2019-11-19 18:16:58	t	nusr
\.


--
-- TOC entry 3502 (class 0 OID 17009)
-- Dependencies: 227
-- Data for Name: tbl_employee; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_employee (id, tempid, slno, departmentmappingid, designationid, doj, dol, empid, fname, mname, lname, genderid, mobile, emailid, fathername, mothername, maritalstatusid, spousename, educationid, address, districtid, dob, epfno, esifno, panno, aadharno, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
\.


--
-- TOC entry 3506 (class 0 OID 17107)
-- Dependencies: 231
-- Data for Name: tbl_employee_bank_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_employee_bank_details (id, empid, bankid, acno, ifsccode, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
21	50	41	394572934509238450	ASDFJAS23542	23	2019-10-16 17:31:58	\N	\N	t
\.


--
-- TOC entry 3486 (class 0 OID 16772)
-- Dependencies: 211
-- Data for Name: tbl_employee_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_employee_type (id, typename, entryby, createdat, updatedby, updatedat, isactive, typeshortname) FROM stdin;
23	Full TimesFT	1	2019-08-26 13:43:40	23	2019-08-30 19:27:33	f	FT
24	part time	23	2019-10-16 17:41:04	\N	\N	t	pt
26	Work From Home	23	2019-10-16 17:53:19	\N	\N	t	WFH
27	Hourly	23	2019-10-16 17:54:56	\N	\N	t	hr
28	Free Lancing	23	2019-11-23 12:48:26	23	2019-11-23 12:48:38	t	FL
29	testing	23	2019-11-29 15:50:06	\N	\N	t	test
22	Part Time	1	2019-08-26 13:30:41	23	2019-12-29 17:08:52	t	adf
\.


--
-- TOC entry 3525 (class 0 OID 17890)
-- Dependencies: 252
-- Data for Name: tbl_experiance_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_experiance_type (id, type, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
3	Fresher	23	2019-09-10 11:57:56	23	2019-09-10 11:58:11	t
2	Test	23	2019-09-09 18:19:48	23	2019-10-15 18:13:30	f
1	Testing	23	2019-09-09 18:18:49	23	2019-10-15 18:13:31	f
4	2years	23	2019-09-13 15:34:28	23	2019-10-15 18:13:36	t
6	10th +2	23	2019-09-13 16:02:43	23	2019-10-15 18:13:38	f
8	4years	23	2019-10-17 16:40:07	23	2019-10-17 16:40:24	t
5	3years	23	2019-09-13 15:34:37	23	2019-10-17 16:40:35	t
9	5years	23	2019-10-17 16:41:17	\N	\N	t
\.


--
-- TOC entry 3488 (class 0 OID 16794)
-- Dependencies: 213
-- Data for Name: tbl_gender; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_gender (id, gendername, entryby, createdat, updatedby, updatedat, isactive, gendernshortame) FROM stdin;
20	Nutral	23	2019-10-17 14:13:48	\N	\N	t	ntl
2	Others	1	2019-08-26 12:12:31	23	2019-11-05 17:28:34	t	sdfgs
21	Testings	23	2019-10-17 14:14:26	23	2019-11-05 17:33:27	t	test
22	Runnings	23	2019-10-17 14:14:50	23	2019-11-05 17:33:47	t	Run
1	Female	1	2019-08-26 12:12:25	23	2019-11-05 17:35:28	t	\N
3	Male	1	2019-08-26 12:12:20	23	2019-11-05 17:35:29	t	\N
24	asdfa	23	2019-11-09 15:04:45	\N	\N	t	sdfas
25	Testing	23	2019-11-21 18:06:29	\N	\N	t	test
23	gendertesting	23	2019-11-05 17:33:55	23	2019-11-21 18:07:10	t	gt
\.


--
-- TOC entry 3512 (class 0 OID 17602)
-- Dependencies: 239
-- Data for Name: tbl_job_posting; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_job_posting (id, postname, companyid, designationid, nov, localtion, jobdescription, experience, responsibility, startdate, enddate, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
138	dfasdfas	1	12	9	dfas	asdf	adfasd	asdfasd	2019-08-26	2019-09-19	23	2019-09-19 17:54:34	\N	\N	t
131	Office Staff	1	13	15	Patia Gbc building	Working as a simple job	12years	Manage the office	2019-09-02	2019-09-19	23	2019-09-19 16:20:31	23	2019-09-19 18:01:13	t
132	Python Developer	1	11	2	Patia Bhubaneswar		2years	Developing full inhouse projects and leading the tech team	2019-09-02	2019-09-19	23	2019-09-19 16:52:12	23	2019-12-28 15:46:59	f
133	abc post	16	11	12	Rasulgarh	Describe here	3yerar	nothing	2019-09-09	2019-09-19	23	2019-09-19 17:00:28	23	2019-12-28 15:47:00	f
134	Sipence	16	11	22	Puri	Nothing	Fresher	Responsibility	2019-09-03	2019-09-19	23	2019-09-19 17:49:01	23	2019-12-28 15:47:01	f
136	sfgsdf	16	12	2	adfa	adfas	asdfas	asdfasd	2019-09-03	2019-09-19	23	2019-09-19 17:52:55	23	2019-12-28 15:47:06	f
139	sdfgs	27	14	34	adfasd	asdfasd	2	sdf	2019-12-02	2019-12-31	23	2019-12-29 12:44:27	\N	\N	t
\.


--
-- TOC entry 3514 (class 0 OID 17636)
-- Dependencies: 241
-- Data for Name: tbl_job_posting_qualification; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_job_posting_qualification (id, jpid, qualificationid, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
114	132	17	23	2019-09-19 16:52:12	\N	\N	t
115	133	17	23	2019-09-19 17:00:28	\N	\N	t
116	134	17	23	2019-09-19 17:49:01	\N	\N	t
117	136	18	23	2019-09-19 17:52:55	\N	\N	t
118	138	18	23	2019-09-19 17:54:34	\N	\N	t
119	139	21	23	2019-12-29 12:44:27	\N	\N	t
113	131	17	23	2019-09-19 16:20:31	\N	\N	t
\.


--
-- TOC entry 3518 (class 0 OID 17688)
-- Dependencies: 245
-- Data for Name: tbl_job_posting_skill; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_job_posting_skill (id, jpid, skillid, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
114	132	1	23	2019-09-19 16:52:12	\N	\N	t
115	133	1	23	2019-09-19 17:00:28	\N	\N	t
116	134	1	23	2019-09-19 17:49:01	\N	\N	t
117	136	1	23	2019-09-19 17:52:55	\N	\N	t
118	138	1	23	2019-09-19 17:54:34	\N	\N	t
119	139	7	23	2019-12-29 12:44:27	\N	\N	t
113	131	1	23	2019-09-19 16:20:31	\N	\N	t
\.


--
-- TOC entry 3490 (class 0 OID 16816)
-- Dependencies: 215
-- Data for Name: tbl_marital_status; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_marital_status (id, statusname, entryby, createdat, updatedby, updatedat, isactive, statusnshortame) FROM stdin;
1	Married	1	2019-08-26 12:45:45	\N	\N	t	\N
2	Unmarried	1	2019-08-26 12:45:51	\N	\N	t	\N
3	Bachlore	1	2019-08-26 12:13:01	1	2019-08-26 12:48:46	t	\N
22	Testing	23	2019-08-30 16:38:42	23	2019-08-30 16:38:56	f	tests
24	Widow	23	2019-10-17 15:17:22	\N	\N	t	wid
\.


--
-- TOC entry 3541 (class 0 OID 34912)
-- Dependencies: 272
-- Data for Name: tbl_periodtype; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_periodtype (id, periodtype, entryby, updatedby, updatedat, createdat, isactive) FROM stdin;
2	Years	23	\N	\N	2019-11-01 13:28:54	t
3	asdfasd	23	\N	\N	2019-11-05 17:26:58	t
4	Hour	23	\N	\N	2019-11-09 14:49:07	t
1	Months	23	23	2019-11-11 11:43:40	2019-11-01 13:24:24	f
5	Weekly	23	\N	\N	2019-11-21 17:15:28	t
6	Annually	23	23	2019-11-21 17:18:04	2019-11-21 17:16:20	t
7	daywies	23	23	2019-11-21 17:18:16	2019-11-21 17:17:39	t
\.


--
-- TOC entry 3520 (class 0 OID 17718)
-- Dependencies: 247
-- Data for Name: tbl_recruitment_application; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_recruitment_application (id, fname, mname, lname, fathername, mothername, spousename, dob, maritalstatusid, genderid, religionid, contact, altcontact, whatsapp, email, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
98	Pinkus	sing	Sethi	Rajesh	Minati	Roja	2012-01-24	1	3	3	9861443185	9861959697	9861443185	pinku@gmail.com	23	2019-10-14 13:54:47	23	2019-10-14 14:14:02	t
96	Sujane		Sing	Suman Kumar Sing	Binita Kour		2019-10-16	3	3	1	9861449878	9234487989	9861449878	sanjay@gmail.com	23	2019-10-03 18:20:49	\N	2019-10-15 11:20:32	t
101	Sundar	Kumar	Sahoo	Sankar Sahoo	Soumya Sahoo	Sabitri Sahoo	2019-10-15	1	3	1	9865326598	9778058898	9865326598	sudarsahoo@gmail.com	23	2019-10-15 14:24:57	\N	\N	t
102	Sundar	Kumar	Sahoo	Sankar Sahoo	Soumya Sahoo	Sabitri Sahoo	2019-10-15	1	3	1	9865326598	9778058898	9865326598	sudarsahoo@gmail.com	23	2019-10-15 14:26:35	23	2019-10-15 14:31:43	f
100	Magunis		Nayak	Satya Nayak	Mousumi Nayak	Radha Nayak	1967-02-02	1	3	2	9207568569	9439492227	9207568569	magunimagunimaguni@gmail.com	23	2019-10-14 14:17:30	23	2019-10-15 15:08:32	f
99	Reema		das	Kapilsh	Kalyani	bigul	2012-01-02	1	1	1	9861443182	9778568977	9861443182	rema@gmail.com	23	2019-10-14 13:59:07	23	2019-10-15 16:27:11	t
97	Raghunath	Kumar	giri	Sambhunath Giri	Sasmita Giri	Rakhi Giiri	2019-10-21	1	3	1	9090147177	9778798987	9090147177	raghunath@gmail.com	23	2019-10-05 12:39:26	23	2019-11-19 14:13:12	t
103	werqwer	werqw	erqwer	qwerqwe	asdfasdf	asdfwer	2019-11-14	1	20	1	8567456745	7456745674	8567456745	sdfg@asd.sfda	23	2019-11-19 18:02:24	\N	\N	t
\.


--
-- TOC entry 3510 (class 0 OID 17580)
-- Dependencies: 237
-- Data for Name: tbl_religion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_religion (id, religion, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
1	Hindu	23	2019-09-09 15:21:31	23	2019-09-09 15:22:22	t
2	Christan	23	2019-09-10 11:03:10	\N	\N	t
3	Muslim	23	2019-09-10 11:06:53	\N	\N	t
4	Sikh	23	2019-10-17 12:38:40	\N	\N	t
6	Isai	23	2019-10-17 13:03:44	\N	\N	t
7	ihudi	23	2019-10-31 16:43:29	\N	\N	t
8	Kolha	23	2019-11-11 15:56:29	\N	\N	t
\.


--
-- TOC entry 3543 (class 0 OID 34962)
-- Dependencies: 274
-- Data for Name: tbl_resource; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_resource (id, resourcetypeid, companyid, modelnumber, serialnumber, purchagingdate, servicecenteraddress, servicecentermobile, assurancetypeid, assuranceperiod, periodtypeid, assuranceexpired, entryby, updatedby, updatedat, createdat, isactive) FROM stdin;
1	1	2	asdfas23452	2345234	2019-11-04	bhubaneswar	9865987588	1	2	2	2019-11-04	23	23	2019-11-06 15:38:01	2019-11-05 16:59:10	f
3	1	2	345234	wrt2345234	2019-11-04	bndfgfghdfg	9678567456	1	6	1	2019-11-04	23	23	2019-11-06 15:38:02	2019-11-05 17:20:17	f
2	1	1	asdfasdfasd	fasdfasdf	2019-11-06	asdfasdf	9987954654	1	3	2	2019-11-06	23	23	2019-11-06 15:38:10	2019-11-05 17:16:00	t
4	1	2	asdfasdf	werqwerqw	2019-11-14	asdfasd	8465785678	2	3	1	2019-11-14	23	\N	\N	2019-11-09 13:50:55	t
5	4	2	sjdfajswew	2345234523	2019-11-11	asdfasd	9865985698	4	2	2	2019-11-11	23	\N	\N	2019-11-11 11:53:13	t
6	5	1	asdasdf	45234rqwefasdf	2019-11-19	asdfasd	9678967896	1	3	2	2019-11-19	23	\N	\N	2019-11-21 15:17:18	t
7	5	5	wrqwrqwr	qwerqwer	2019-11-20	qwe4asdfa	9789878998	3	2	2	2019-11-21	23	\N	\N	2019-11-21 16:06:07	t
8	5	1	456345635	4567456745674567	2019-12-03	sdgedfgsdg	9867896789	1	3	2	2019-12-17	23	\N	\N	2019-12-20 12:22:32	t
9	5	1	asdfasdf	234523452345233	2019-12-09	fadfasdf	9867896789	1	4	2	2019-12-16	23	\N	\N	2019-12-28 15:57:32	t
10	4	2	abcd	98797997	2019-12-09	Cuttack	9861443189	2	3	2	2019-12-30	23	\N	\N	2019-12-28 15:59:38	t
11	7	5	vfgty	879877788855	2019-12-01	fnvb	8678678567	1	2	2	2021-12-01	23	\N	\N	2019-12-29 00:50:12	t
12	6	12	Neo	159159965965	2019-12-30	Saheednagar	9856932569	4	2	2	2019-12-30	23	\N	\N	2019-12-29 00:53:01	t
\.


--
-- TOC entry 3537 (class 0 OID 34755)
-- Dependencies: 268
-- Data for Name: tbl_resource_company; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_resource_company (id, companyname, comapnyshortname, entryby, updatedby, updatedat, createdat, isactive) FROM stdin;
5	Xiaomi	mi	23	\N	\N	2019-11-19 16:16:17	t
1	Lenovo	Lenovo	23	23	2019-11-19 16:48:45	2019-11-01 17:36:33	t
3	Dell Computer	Dell	23	23	2019-11-21 16:37:04	2019-11-05 16:50:33	t
10	Xerox Corporation	xers	23	23	2019-11-21 16:37:22	2019-11-19 17:39:15	t
2	Samsung Corporation	Samsung	23	23	2019-11-21 16:38:22	2019-11-01 18:05:02	t
6	Nova Technologies	Nova	23	23	2019-11-21 16:39:36	2019-11-19 16:54:28	t
11	Mahendra Technologie	Mahi	23	\N	\N	2019-11-21 16:44:18	t
8	Zomato Foods	zomat	23	23	2019-11-21 16:45:50	2019-11-19 17:38:13	t
12	Swigi Foods	swigi	23	\N	\N	2019-11-21 16:46:43	t
7	Kalinga technologies	KTech	23	23	2019-11-21 16:47:27	2019-11-19 17:13:04	t
13	Kalinga Technologies	KTech	23	\N	\N	2019-11-21 16:50:24	t
4	Luminous Technoloig	Lumin	23	23	2019-11-21 16:51:35	2019-11-05 16:50:53	t
14	Swadesh Infra 	Swaes	23	\N	\N	2019-11-21 17:03:04	t
9	Amazon Technologies	amazo	23	23	2019-11-21 17:03:56	2019-11-19 17:38:42	t
15	TCS Technologies	tcs	23	\N	\N	2019-11-21 17:04:11	t
\.


--
-- TOC entry 3535 (class 0 OID 34738)
-- Dependencies: 266
-- Data for Name: tbl_resource_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_resource_type (id, typename, typeshortname, entryby, updatedby, updatedat, createdat, isactive) FROM stdin;
4	Patch Cord	pc	23	\N	\N	2019-11-09 14:15:38	t
5	Printer	print	23	\N	\N	2019-11-09 14:16:20	t
2	Mouse	Mouse	23	23	2019-11-11 11:42:06	2019-11-02 16:08:27	f
3	All in one pc	pc	23	23	2019-11-11 11:42:06	2019-11-05 16:50:11	f
1	KeyBoard	KBoar	23	23	2019-11-21 16:32:04	2019-11-01 15:39:16	f
6	UPS Power Bank	ups	23	23	2019-11-21 17:25:45	2019-11-21 16:30:39	t
7	Laptop Cord	cable	23	\N	\N	2019-11-21 17:26:05	t
\.


--
-- TOC entry 3516 (class 0 OID 17666)
-- Dependencies: 243
-- Data for Name: tbl_skill; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_skill (id, skill, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
1	php	23	2019-09-09 15:54:22	23	2019-10-15 18:29:08	t
7	Bootstrap	23	2019-10-17 16:31:13	23	2019-10-17 16:33:16	t
2	mysql	23	2019-09-09 15:56:12	23	2019-10-17 16:33:19	t
9	Architect	23	2019-11-19 17:41:40	\N	\N	t
8	JsLibrary	23	2019-11-09 15:05:36	23	2019-11-19 17:42:03	t
\.


--
-- TOC entry 3478 (class 0 OID 16656)
-- Dependencies: 203
-- Data for Name: tbl_state; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_state (id, statename, entryby, createdat, updatedby, updatedat, isactive, stateshortname) FROM stdin;
32	kalinga	23	2019-08-30 17:51:07	23	2019-08-30 17:51:19	t	kalis
33	Ladakh	23	2019-08-30 17:52:36	\N	\N	t	ladak
34	delhi	23	2019-10-16 17:56:51	\N	\N	t	dh
37	Bihar	23	2019-10-16 18:28:56	\N	\N	t	bh
38	Goa	23	2019-11-09 14:23:17	\N	\N	t	Goa
40	Singapore	23	2019-11-13 17:22:09	\N	\N	t	Singp
42	Nagaland	23	2019-11-19 17:16:41	23	2019-11-19 17:16:49	t	nags
43	Andhra Pradesh	23	2019-11-21 18:01:39	\N	\N	t	AP
44	Madhya Pradesh	23	2019-11-21 18:02:07	\N	\N	t	MP
31	Uttar Pradesh	23	2019-08-30 13:40:36	23	2019-11-21 18:02:37	t	UP
30	Jammu and Kashmir	1	2019-08-26 11:18:22	23	2019-11-21 18:04:09	t	JandK
36	Hariyana	23	2019-10-16 18:21:15	23	2019-11-21 18:05:17	t	Hr
20	Rajastans	1	2019-08-25 19:25:15	23	2019-11-21 23:31:23	t	Rajas
21	Tamilnadu	1	2019-08-26 10:46:27	23	2019-11-21 23:31:35	t	Tn
22	Arunanchal Pradesh	1	2019-08-26 10:48:17	23	2019-11-21 23:31:47	t	AP
23	Karnataka	1	2019-08-26 10:50:01	23	2019-11-21 23:31:58	t	Kt
17	Delhi	1	2019-08-25 19:24:50	23	2019-11-21 23:32:10	t	Delhi
18	Punjabi	1	2019-08-25 19:25:03	23	2019-11-22 11:24:57	t	Punja
24	Malayalam	1	2019-08-26 11:13:09	23	2019-11-22 11:25:20	t	Malay
16	Odisha	1	2019-08-25 19:17:40	23	2019-11-22 11:25:33	t	Odisa
25	Mizoram	1	2019-08-26 11:13:42	23	2019-11-22 11:25:45	t	Mizor
39	Assom	23	2019-11-13 17:20:35	23	2019-11-22 18:44:17	t	assam
45	qwer	23	2019-11-22 18:44:31	\N	\N	t	qwe
46	rfasd	23	2019-11-22 18:46:36	\N	\N	t	asdf
28	Manipur	1	2019-08-26 11:15:45	23	2019-11-22 18:58:44	t	manip
47	adf	23	2019-11-23 11:08:05	\N	\N	t	sdf
48	hesdf	23	2019-11-23 11:41:55	23	2019-11-23 11:42:04	t	wer
41	Utrarakhand	23	2019-11-18 13:52:13	23	2019-11-27 08:19:06	t	UK
49	Puduchery	23	2019-12-04 15:30:17	\N	\N	t	PC
26	Maharastra	1	2019-08-26 11:14:31	23	2019-12-04 15:30:43	f	\N
29	Telengana	1	2019-08-26 11:17:41	23	2019-12-04 15:30:44	f	\N
27	Gujurat	1	2019-08-26 11:14:52	23	2019-12-04 15:30:44	f	\N
50	asdkjfsdf	23	2019-12-05 18:24:52	\N	\N	t	sdf
19	Kerlaasdf	1	2019-08-25 19:25:09	23	2019-12-05 18:40:25	f	Kerla
51	klk	23	2019-12-08 01:12:26	\N	\N	t	dd
\.


--
-- TOC entry 3500 (class 0 OID 16937)
-- Dependencies: 225
-- Data for Name: tbl_temp_employee; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_temp_employee (id, slno, departmentmappingid, designationid, doj, dol, empid, fname, mname, lname, genderid, mobile, emailid, fathername, mothername, maritalstatusid, spousename, educationid, address, districtid, dob, epfno, esifno, panno, aadharno, entryby, createdat, updatedby, updatedat, isactive, isqueue, isrejeted, isvalid, isattendance) FROM stdin;
58	145258	34	11	2018-12-10	\N	aa234	Abhikrit		Kumar	1	9856987458	sudipta@gmail.com	Anirudha Pothal	Sujata Pothal	1	Kalyani Pothal	14	Sambalpur	26	2010-12-05	ADFASD/ASDFAS/ASDFASD	31565654987965654	asdf6a5s4d	799998946498	23	2019-12-29 18:08:26	23	2019-12-29 19:00:30	t	f	f	f	t
57	987998	28	17	2019-12-01	\N	adkf242	Pritish		Kumar	1	9861307897	niruniru@gmail.com	Dhurandhar Nayak	Sabita Nayak	2		16	Biranarasingh pur	3	1986-12-07	SLDFJALSDFJLASDFLASDJ	98794654987913203	asd9875465	987946549876	23	2019-12-28 22:40:22	\N	\N	t	f	f	f	t
54	233	34	12	2018-06-04	\N	AA007	Ranjan	Kumar	Sahoo	1	9938879589	rakesh@gmail.com	Ashok Kumar Raymohap	Manjulata Raymohapatra	1	Swatismita Raymohaptra	12	Chekeisiani, Bhubaneswar	3	1983-11-17	QWERUOWEUROAS24234345	23523452345234524	bghpm24312	316798569896	23	2019-11-06 11:30:55	23	2019-12-29 21:20:20	t	f	f	f	t
50	4224	25	11	2019-08-13	2019-08-04	sada43434	Lipsa		Mohanty	2	7978641256	swager@gmail.com	Sagita	Sartia	2	Sers	12	up puri	13	2019-08-14	ALSDJFLS/ASDLFALSD343	97986546979979790	asdjf43434	616465165464	23	2019-08-31 17:52:52	23	2019-12-29 17:53:36	t	f	f	f	t
56	324523	25	12	2019-12-17	\N	askda	Millan		Pattnaik	1	9798989998	sdfgsdf@asdf.sdf	eghdfghdfgh	awerqwer	1	sfsdf	14	sdfgsdf	36	2019-12-10	ASDFADSFASDFASDFASDFA	23452345234523452	zxcvzxzvcz	234523452345	23	2019-12-28 19:13:11	23	2019-12-29 17:01:37	t	f	f	f	t
51	345235	25	8	1988-02-02	1985-02-02	asdfa42342	Gurubachn		Sing	1	9861235698	guru@gmailc.om	Raghubanchn	Mira Bachan	1	Swati bachna	14	Punchjmukhi	6	2018-12-02	LJL345234523423L45234	23452342345234230	kjouidjk23	979879879797	23	2019-08-31 18:28:27	23	2019-12-29 16:22:31	t	f	f	f	t
53	94676	25	8	1988-02-02	1985-02-02	wfdfa42342	Suvasmita		Sahoo	2	9861235633	guru@gmailc.om	Raghubanchns	Mirabai Bachan	1	Swatibai bachna	20	Punchjmukhi	2	2018-12-02	GRRW45234523423L45234	63324342345234234	bgrsldjk23	345234329797	23	2019-08-31 18:32:06	23	2019-12-29 17:48:46	t	f	f	f	t
55	24234234	34	12	2019-11-10	\N	22345234asfasd	Abhijit		Panda	1	9861334888	fasd@asdf.asd	asdfasdf	asdfasdf	2	asdfasd	13	asdfasd	27	2019-11-04	ASDF/ASDFAS/ASDFASD/A	65465498794654660	asdfasd4as	987989897979	23	2019-11-16 12:52:29	23	2019-12-29 18:58:42	t	f	f	f	t
\.


--
-- TOC entry 3474 (class 0 OID 16600)
-- Dependencies: 199
-- Data for Name: tbl_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_user (id, usertypeid, fname, emailid, mobile, dob, logo, entryby, createdat, updatedby, updatedat, isactive, username, mname, lname) FROM stdin;
1	1	Bijay	sipence.007@gmail.com	9861443188	1987-07-07	\N	1	2019-08-25 09:42:09.009035	23	2019-08-31 11:11:28	t	sipence	Bhusan	Mohanty
47	1	Rohit	rohit@gmail.com	9861234265	1987-05-02	\N	23	2019-09-04 19:49:01	\N	\N	t	Rohitsharma		Sharma
23	2	sipencesoft	sipencey.007@gmail.com	7978613448	2019-08-21	\N	1	2019-08-28 17:15:13	23	2019-08-30 18:49:56	t	sipencesoft		
21	8	mohanty	abc@gmail.co.in	9238850515	1988-06-07	\N	1	2019-08-28 19:00:10	23	2019-10-21 18:44:34	t	Sipencesoft	bijaya	sing
50	2	Asimananda	asimapinku@gmail.com	7978777407	1998-05-22	\N	23	2019-10-22 16:40:56	\N	\N	t	asimananda		Jena
51	7	asdfasdf	asdf@asdf.csdf	9861443189	2019-10-28	\N	23	2019-11-20 12:04:27	\N	\N	t	sdfasdf	sdfasd	asdf
53	12	Dibya	dibyapanda@gmail.com	9090200747	2000-12-24	\N	23	2019-12-13 14:39:38	\N	\N	t	Rajesh		Panda
54	12	Dibyajyoti	dibyapanda12@gmail.com	7064598823	2000-02-11	\N	23	2019-12-13 14:40:49	\N	\N	t	devilDibya		Panda
55	2	Suraj	suraj@gmail.com	9029014012	2010-12-12		23	2019-12-14 01:37:12	\N	\N	t	Surajsipng	kumar	Coutala
56	8	adfasdf	asdk@gasd.com	8749698699	2019-12-24		23	2019-12-14 01:40:49	\N	\N	t	noname	asdfasd	asdfasdf
58	8	Sujata	sujata@gmail.com	9029014018	2005-12-25		23	2019-12-14 01:47:13	\N	\N	t	sujata		sing
59	8	sipence	hell@gmail.com	9214589878	2019-12-24		23	2019-12-14 23:45:38	\N	\N	t	hellboy	softt	mohanty
60	2	asdfasdf	asdf@asdf.com	9876589658	2019-12-10	\N	23	2019-12-15 21:24:22	\N	\N	t	abcdef	asdfasdf	asdfasd
62	2	asdfasdf	asdf@asd.sdf	9809809899	2019-12-30	\N	23	2019-12-16 00:09:06	\N	\N	t	asiddf	asdfasd	fasdfasdf
65	7	Hello 	hello@gmail.com	9090200740	2019-12-18	\N	23	2019-12-29 11:52:36	\N	\N	t	hellomr	sipence	how
67	8	Sujane	sujane@gmail.com	9861443180	2019-12-18	\N	23	2019-12-29 11:57:27	\N	\N	t	suzane		khan
\.


--
-- TOC entry 3476 (class 0 OID 16621)
-- Dependencies: 201
-- Data for Name: tbl_user_authentication; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_user_authentication (id, userid, password, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
7	23	admin123	1	2019-08-28 17:15:13	\N	\N	t
24	47	9861234264	23	2019-09-04 19:49:01	\N	\N	t
25	50	7978777407	23	2019-10-22 16:40:56	\N	\N	t
26	51	9861443189	23	2019-11-20 12:04:27	\N	\N	t
27	53	9090200747	23	2019-12-13 14:39:38	\N	\N	t
28	54	7064598823	23	2019-12-13 14:40:49	\N	\N	t
29	55	9029014012	23	2019-12-14 01:37:13	\N	\N	t
30	56	8749698699	23	2019-12-14 01:40:49	\N	\N	t
31	58	9029014018	23	2019-12-14 01:47:13	\N	\N	t
32	59	9214589878	23	2019-12-14 23:45:39	\N	\N	t
33	60	9876589658	23	2019-12-15 21:24:23	\N	\N	t
34	62	9809809899	23	2019-12-16 00:09:06	\N	\N	t
35	65	9090200740	23	2019-12-29 11:52:36	\N	\N	t
36	67	9861443180	23	2019-12-29 11:57:27	\N	\N	t
\.


--
-- TOC entry 3472 (class 0 OID 16588)
-- Dependencies: 197
-- Data for Name: tbl_user_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_user_type (id, typename, entryby, createdat, updatedby, updatedat, isactive, usertypeshortname) FROM stdin;
7	Tele Caller	1	2019-08-27 17:07:17	\N	\N	t	TC
5	Team Leader	1	2019-08-27 16:24:23	1	2019-08-27 17:32:53	f	TL
8	Supervisor	1	2019-08-27 17:33:20	\N	\N	t	SP
2	User	1	2019-08-25 09:39:35.326777	1	2019-08-28 18:15:24	t	User
6	Sipence	1	2019-08-27 17:06:36	23	2019-08-30 18:48:31	f	TCs
1	Admin	1	2019-08-25 09:39:24.9031	23	2019-10-21 14:10:49	t	admin
12	Wordpress Developer	23	2019-12-13 13:55:26	\N	\N	t	wd
\.


--
-- TOC entry 3508 (class 0 OID 17172)
-- Dependencies: 233
-- Data for Name: tbl_year; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_year (id, year, entryby, createdat, updatedby, updatedat, isactive) FROM stdin;
22	2005	1	2019-08-25 19:33:28	\N	\N	t
23	2006	1	2019-08-25 19:33:43	\N	\N	t
24	2007	1	2019-08-25 19:33:45	\N	\N	t
25	2010	1	2019-08-25 19:33:50	\N	\N	t
31	2000	23	2019-11-11 15:50:24	\N	\N	t
32	1987	23	2019-11-11 15:50:35	\N	\N	t
20	2003	1	2019-08-25 19:33:22	23	2019-11-19 17:10:55	t
21	2004	1	2019-08-25 19:33:25	23	2019-11-27 14:11:10	t
19	2002	1	2019-08-25 19:33:18	23	2019-11-27 14:11:11	t
26	2011	1	2019-08-26 11:44:42	23	2019-11-27 14:11:11	t
29	2012	23	2019-10-17 12:32:48	23	2019-11-27 14:11:12	t
30	2013	23	2019-10-17 12:33:22	23	2019-11-27 14:11:12	t
\.


--
-- TOC entry 3597 (class 0 OID 0)
-- Dependencies: 248
-- Name: tbl_applicant_qualification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_applicant_qualification_id_seq', 71, true);


--
-- TOC entry 3598 (class 0 OID 0)
-- Dependencies: 258
-- Name: tbl_applicant_work_experiance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_applicant_work_experiance_id_seq', 54, true);


--
-- TOC entry 3599 (class 0 OID 0)
-- Dependencies: 269
-- Name: tbl_assurance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_assurance_id_seq', 7, true);


--
-- TOC entry 3600 (class 0 OID 0)
-- Dependencies: 281
-- Name: tbl_attendance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_attendance_id_seq', 73, true);


--
-- TOC entry 3601 (class 0 OID 0)
-- Dependencies: 263
-- Name: tbl_attendance_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_attendance_type_id_seq', 6, true);


--
-- TOC entry 3602 (class 0 OID 0)
-- Dependencies: 228
-- Name: tbl_bank_name_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_bank_name_id_seq', 51, true);


--
-- TOC entry 3603 (class 0 OID 0)
-- Dependencies: 256
-- Name: tbl_communication_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_communication_details_id_seq', 102, true);


--
-- TOC entry 3604 (class 0 OID 0)
-- Dependencies: 253
-- Name: tbl_communication_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_communication_type_id_seq', 4, true);


--
-- TOC entry 3605 (class 0 OID 0)
-- Dependencies: 208
-- Name: tbl_company_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_company_id_seq', 28, true);


--
-- TOC entry 3606 (class 0 OID 0)
-- Dependencies: 206
-- Name: tbl_company_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_company_type_id_seq', 47, true);


--
-- TOC entry 3607 (class 0 OID 0)
-- Dependencies: 278
-- Name: tbl_datemanagement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_datemanagement_id_seq', 9, true);


--
-- TOC entry 3608 (class 0 OID 0)
-- Dependencies: 276
-- Name: tbl_datetype_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_datetype_id_seq', 4, true);


--
-- TOC entry 3609 (class 0 OID 0)
-- Dependencies: 218
-- Name: tbl_department_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_department_id_seq', 13, true);


--
-- TOC entry 3610 (class 0 OID 0)
-- Dependencies: 222
-- Name: tbl_department_mapping_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_department_mapping_id_seq', 37, true);


--
-- TOC entry 3611 (class 0 OID 0)
-- Dependencies: 220
-- Name: tbl_designation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_designation_id_seq', 18, true);


--
-- TOC entry 3612 (class 0 OID 0)
-- Dependencies: 204
-- Name: tbl_district_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_district_id_seq', 37, true);


--
-- TOC entry 3613 (class 0 OID 0)
-- Dependencies: 216
-- Name: tbl_education_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_education_id_seq', 26, true);


--
-- TOC entry 3614 (class 0 OID 0)
-- Dependencies: 230
-- Name: tbl_employee_bank_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_employee_bank_details_id_seq', 21, true);


--
-- TOC entry 3615 (class 0 OID 0)
-- Dependencies: 226
-- Name: tbl_employee_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_employee_id_seq', 7, true);


--
-- TOC entry 3616 (class 0 OID 0)
-- Dependencies: 210
-- Name: tbl_employee_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_employee_type_id_seq', 29, true);


--
-- TOC entry 3617 (class 0 OID 0)
-- Dependencies: 250
-- Name: tbl_experiance_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_experiance_type_id_seq', 1, false);


--
-- TOC entry 3618 (class 0 OID 0)
-- Dependencies: 251
-- Name: tbl_experiance_type_id_seq1; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_experiance_type_id_seq1', 9, true);


--
-- TOC entry 3619 (class 0 OID 0)
-- Dependencies: 212
-- Name: tbl_gender_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_gender_id_seq', 25, true);


--
-- TOC entry 3620 (class 0 OID 0)
-- Dependencies: 238
-- Name: tbl_job_posting_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_job_posting_id_seq', 139, true);


--
-- TOC entry 3621 (class 0 OID 0)
-- Dependencies: 240
-- Name: tbl_job_posting_qualification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_job_posting_qualification_id_seq', 119, true);


--
-- TOC entry 3622 (class 0 OID 0)
-- Dependencies: 244
-- Name: tbl_job_posting_skill_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_job_posting_skill_id_seq', 119, true);


--
-- TOC entry 3623 (class 0 OID 0)
-- Dependencies: 214
-- Name: tbl_marital_status_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_marital_status_id_seq', 24, true);


--
-- TOC entry 3624 (class 0 OID 0)
-- Dependencies: 271
-- Name: tbl_periodtype_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_periodtype_id_seq', 7, true);


--
-- TOC entry 3625 (class 0 OID 0)
-- Dependencies: 246
-- Name: tbl_recruitment_application_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_recruitment_application_id_seq', 103, true);


--
-- TOC entry 3626 (class 0 OID 0)
-- Dependencies: 236
-- Name: tbl_religion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_religion_id_seq', 8, true);


--
-- TOC entry 3627 (class 0 OID 0)
-- Dependencies: 267
-- Name: tbl_resource_company_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_resource_company_id_seq', 15, true);


--
-- TOC entry 3628 (class 0 OID 0)
-- Dependencies: 273
-- Name: tbl_resource_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_resource_id_seq', 12, true);


--
-- TOC entry 3629 (class 0 OID 0)
-- Dependencies: 265
-- Name: tbl_resource_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_resource_type_id_seq', 7, true);


--
-- TOC entry 3630 (class 0 OID 0)
-- Dependencies: 242
-- Name: tbl_skill_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_skill_id_seq', 9, true);


--
-- TOC entry 3631 (class 0 OID 0)
-- Dependencies: 202
-- Name: tbl_state_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_state_id_seq', 53, true);


--
-- TOC entry 3632 (class 0 OID 0)
-- Dependencies: 224
-- Name: tbl_temp_employee_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_temp_employee_id_seq', 58, true);


--
-- TOC entry 3633 (class 0 OID 0)
-- Dependencies: 200
-- Name: tbl_user_authentication_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_user_authentication_id_seq', 36, true);


--
-- TOC entry 3634 (class 0 OID 0)
-- Dependencies: 198
-- Name: tbl_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_user_id_seq', 67, true);


--
-- TOC entry 3635 (class 0 OID 0)
-- Dependencies: 196
-- Name: tbl_user_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_user_type_id_seq', 12, true);


--
-- TOC entry 3636 (class 0 OID 0)
-- Dependencies: 232
-- Name: tbl_year_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_year_id_seq', 32, true);


--
-- TOC entry 3203 (class 2606 OID 17765)
-- Name: tbl_applicant_qualification tbl_applicant_qualification_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_qualification
    ADD CONSTRAINT tbl_applicant_qualification_pkey PRIMARY KEY (id);


--
-- TOC entry 3215 (class 2606 OID 18049)
-- Name: tbl_applicant_work_experiance tbl_applicant_work_experiance_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_work_experiance
    ADD CONSTRAINT tbl_applicant_work_experiance_pkey PRIMARY KEY (id);


--
-- TOC entry 3223 (class 2606 OID 34777)
-- Name: tbl_assurance tbl_assurance_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_assurance
    ADD CONSTRAINT tbl_assurance_pkey PRIMARY KEY (id);


--
-- TOC entry 3233 (class 2606 OID 43390)
-- Name: tbl_attendance tbl_attendance_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_attendance
    ADD CONSTRAINT tbl_attendance_pkey PRIMARY KEY (id);


--
-- TOC entry 3217 (class 2606 OID 34693)
-- Name: tbl_attendance_type tbl_attendance_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_attendance_type
    ADD CONSTRAINT tbl_attendance_type_pkey PRIMARY KEY (id);


--
-- TOC entry 3173 (class 2606 OID 17094)
-- Name: tbl_bank_name tbl_bank_name_bankname_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_bank_name
    ADD CONSTRAINT tbl_bank_name_bankname_key UNIQUE (bankname);


--
-- TOC entry 3175 (class 2606 OID 17092)
-- Name: tbl_bank_name tbl_bank_name_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_bank_name
    ADD CONSTRAINT tbl_bank_name_pkey PRIMARY KEY (id);


--
-- TOC entry 3213 (class 2606 OID 18008)
-- Name: tbl_communication_details tbl_communication_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_details
    ADD CONSTRAINT tbl_communication_details_pkey PRIMARY KEY (id);


--
-- TOC entry 3209 (class 2606 OID 17923)
-- Name: tbl_communication_type tbl_communication_type_pkey1; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_type
    ADD CONSTRAINT tbl_communication_type_pkey1 PRIMARY KEY (id);


--
-- TOC entry 3211 (class 2606 OID 17925)
-- Name: tbl_communication_type tbl_communication_type_type_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_type
    ADD CONSTRAINT tbl_communication_type_type_key UNIQUE (type);


--
-- TOC entry 3107 (class 2606 OID 16741)
-- Name: tbl_company tbl_company_companyname_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_companyname_key UNIQUE (companyname);


--
-- TOC entry 3109 (class 2606 OID 16743)
-- Name: tbl_company tbl_company_companyshortname_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_companyshortname_key UNIQUE (companyshortname);


--
-- TOC entry 3111 (class 2606 OID 16749)
-- Name: tbl_company tbl_company_emailid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_emailid_key UNIQUE (emailid);


--
-- TOC entry 3113 (class 2606 OID 16745)
-- Name: tbl_company tbl_company_gstno_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_gstno_key UNIQUE (gstno);


--
-- TOC entry 3115 (class 2606 OID 16739)
-- Name: tbl_company tbl_company_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_pkey PRIMARY KEY (id);


--
-- TOC entry 3103 (class 2606 OID 16712)
-- Name: tbl_company_type tbl_company_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company_type
    ADD CONSTRAINT tbl_company_type_pkey PRIMARY KEY (id);


--
-- TOC entry 3105 (class 2606 OID 16714)
-- Name: tbl_company_type tbl_company_type_typename_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company_type
    ADD CONSTRAINT tbl_company_type_typename_key UNIQUE (typename);


--
-- TOC entry 3117 (class 2606 OID 16747)
-- Name: tbl_company tbl_company_url_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_url_key UNIQUE (url);


--
-- TOC entry 3231 (class 2606 OID 43327)
-- Name: tbl_datemanagement tbl_datemanagement_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_datemanagement
    ADD CONSTRAINT tbl_datemanagement_pkey PRIMARY KEY (id);


--
-- TOC entry 3229 (class 2606 OID 43312)
-- Name: tbl_datetype tbl_datetype_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_datetype
    ADD CONSTRAINT tbl_datetype_pkey PRIMARY KEY (id);


--
-- TOC entry 3135 (class 2606 OID 16869)
-- Name: tbl_department tbl_department_departmentname_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department
    ADD CONSTRAINT tbl_department_departmentname_key UNIQUE (departmentname);


--
-- TOC entry 3143 (class 2606 OID 16914)
-- Name: tbl_department_mapping tbl_department_mapping_departmentid_companyid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department_mapping
    ADD CONSTRAINT tbl_department_mapping_departmentid_companyid_key UNIQUE (departmentid, companyid);


--
-- TOC entry 3145 (class 2606 OID 16912)
-- Name: tbl_department_mapping tbl_department_mapping_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department_mapping
    ADD CONSTRAINT tbl_department_mapping_pkey PRIMARY KEY (id);


--
-- TOC entry 3137 (class 2606 OID 16867)
-- Name: tbl_department tbl_department_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department
    ADD CONSTRAINT tbl_department_pkey PRIMARY KEY (id);


--
-- TOC entry 3139 (class 2606 OID 16892)
-- Name: tbl_designation tbl_designation_designationname_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_designation
    ADD CONSTRAINT tbl_designation_designationname_key UNIQUE (designationname);


--
-- TOC entry 3141 (class 2606 OID 16890)
-- Name: tbl_designation tbl_designation_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_designation
    ADD CONSTRAINT tbl_designation_pkey PRIMARY KEY (id);


--
-- TOC entry 3099 (class 2606 OID 16685)
-- Name: tbl_district tbl_district_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_district
    ADD CONSTRAINT tbl_district_pkey PRIMARY KEY (id);


--
-- TOC entry 3101 (class 2606 OID 16687)
-- Name: tbl_district tbl_district_stateid_distname_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_district
    ADD CONSTRAINT tbl_district_stateid_distname_key UNIQUE (stateid, distname);


--
-- TOC entry 3131 (class 2606 OID 16847)
-- Name: tbl_education tbl_education_educationname_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_education
    ADD CONSTRAINT tbl_education_educationname_key UNIQUE (educationname);


--
-- TOC entry 3133 (class 2606 OID 16845)
-- Name: tbl_education tbl_education_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_education
    ADD CONSTRAINT tbl_education_pkey PRIMARY KEY (id);


--
-- TOC entry 3155 (class 2606 OID 17037)
-- Name: tbl_employee tbl_employee_aadharno_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_aadharno_key UNIQUE (aadharno);


--
-- TOC entry 3177 (class 2606 OID 17118)
-- Name: tbl_employee_bank_details tbl_employee_bank_details_acno_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_bank_details
    ADD CONSTRAINT tbl_employee_bank_details_acno_key UNIQUE (acno);


--
-- TOC entry 3179 (class 2606 OID 17116)
-- Name: tbl_employee_bank_details tbl_employee_bank_details_empid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_bank_details
    ADD CONSTRAINT tbl_employee_bank_details_empid_key UNIQUE (empid);


--
-- TOC entry 3181 (class 2606 OID 17114)
-- Name: tbl_employee_bank_details tbl_employee_bank_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_bank_details
    ADD CONSTRAINT tbl_employee_bank_details_pkey PRIMARY KEY (id);


--
-- TOC entry 3157 (class 2606 OID 17029)
-- Name: tbl_employee tbl_employee_emailid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_emailid_key UNIQUE (emailid);


--
-- TOC entry 3159 (class 2606 OID 17025)
-- Name: tbl_employee tbl_employee_empid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_empid_key UNIQUE (empid);


--
-- TOC entry 3161 (class 2606 OID 17031)
-- Name: tbl_employee tbl_employee_epfno_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_epfno_key UNIQUE (epfno);


--
-- TOC entry 3163 (class 2606 OID 17033)
-- Name: tbl_employee tbl_employee_esifno_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_esifno_key UNIQUE (esifno);


--
-- TOC entry 3165 (class 2606 OID 17027)
-- Name: tbl_employee tbl_employee_mobile_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_mobile_key UNIQUE (mobile);


--
-- TOC entry 3167 (class 2606 OID 17035)
-- Name: tbl_employee tbl_employee_panno_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_panno_key UNIQUE (panno);


--
-- TOC entry 3169 (class 2606 OID 17021)
-- Name: tbl_employee tbl_employee_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_pkey PRIMARY KEY (id);


--
-- TOC entry 3171 (class 2606 OID 17023)
-- Name: tbl_employee tbl_employee_slno_departmentmappingid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_slno_departmentmappingid_key UNIQUE (slno, departmentmappingid);


--
-- TOC entry 3119 (class 2606 OID 16779)
-- Name: tbl_employee_type tbl_employee_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_type
    ADD CONSTRAINT tbl_employee_type_pkey PRIMARY KEY (id);


--
-- TOC entry 3121 (class 2606 OID 16781)
-- Name: tbl_employee_type tbl_employee_type_typename_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_type
    ADD CONSTRAINT tbl_employee_type_typename_key UNIQUE (typename);


--
-- TOC entry 3205 (class 2606 OID 17897)
-- Name: tbl_experiance_type tbl_experiance_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_experiance_type
    ADD CONSTRAINT tbl_experiance_type_pkey PRIMARY KEY (id);


--
-- TOC entry 3207 (class 2606 OID 17899)
-- Name: tbl_experiance_type tbl_experiance_type_type_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_experiance_type
    ADD CONSTRAINT tbl_experiance_type_type_key UNIQUE (type);


--
-- TOC entry 3123 (class 2606 OID 16803)
-- Name: tbl_gender tbl_gender_gendername_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_gender
    ADD CONSTRAINT tbl_gender_gendername_key UNIQUE (gendername);


--
-- TOC entry 3125 (class 2606 OID 16801)
-- Name: tbl_gender tbl_gender_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_gender
    ADD CONSTRAINT tbl_gender_pkey PRIMARY KEY (id);


--
-- TOC entry 3191 (class 2606 OID 17613)
-- Name: tbl_job_posting tbl_job_posting_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting
    ADD CONSTRAINT tbl_job_posting_pkey PRIMARY KEY (id);


--
-- TOC entry 3193 (class 2606 OID 17643)
-- Name: tbl_job_posting_qualification tbl_job_posting_qualification_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_qualification
    ADD CONSTRAINT tbl_job_posting_qualification_pkey PRIMARY KEY (id);


--
-- TOC entry 3199 (class 2606 OID 17695)
-- Name: tbl_job_posting_skill tbl_job_posting_skill_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_skill
    ADD CONSTRAINT tbl_job_posting_skill_pkey PRIMARY KEY (id);


--
-- TOC entry 3127 (class 2606 OID 16823)
-- Name: tbl_marital_status tbl_marital_status_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_marital_status
    ADD CONSTRAINT tbl_marital_status_pkey PRIMARY KEY (id);


--
-- TOC entry 3129 (class 2606 OID 16825)
-- Name: tbl_marital_status tbl_marital_status_statusname_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_marital_status
    ADD CONSTRAINT tbl_marital_status_statusname_key UNIQUE (statusname);


--
-- TOC entry 3225 (class 2606 OID 34919)
-- Name: tbl_periodtype tbl_periodtype_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_periodtype
    ADD CONSTRAINT tbl_periodtype_pkey PRIMARY KEY (id);


--
-- TOC entry 3201 (class 2606 OID 17727)
-- Name: tbl_recruitment_application tbl_recruitment_application_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_recruitment_application
    ADD CONSTRAINT tbl_recruitment_application_pkey PRIMARY KEY (id);


--
-- TOC entry 3187 (class 2606 OID 17587)
-- Name: tbl_religion tbl_religion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_religion
    ADD CONSTRAINT tbl_religion_pkey PRIMARY KEY (id);


--
-- TOC entry 3189 (class 2606 OID 17589)
-- Name: tbl_religion tbl_religion_religion_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_religion
    ADD CONSTRAINT tbl_religion_religion_key UNIQUE (religion);


--
-- TOC entry 3221 (class 2606 OID 34762)
-- Name: tbl_resource_company tbl_resource_company_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource_company
    ADD CONSTRAINT tbl_resource_company_pkey PRIMARY KEY (id);


--
-- TOC entry 3227 (class 2606 OID 34969)
-- Name: tbl_resource tbl_resource_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource
    ADD CONSTRAINT tbl_resource_pkey PRIMARY KEY (id);


--
-- TOC entry 3219 (class 2606 OID 34745)
-- Name: tbl_resource_type tbl_resource_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource_type
    ADD CONSTRAINT tbl_resource_type_pkey PRIMARY KEY (id);


--
-- TOC entry 3195 (class 2606 OID 17673)
-- Name: tbl_skill tbl_skill_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_skill
    ADD CONSTRAINT tbl_skill_pkey PRIMARY KEY (id);


--
-- TOC entry 3197 (class 2606 OID 17675)
-- Name: tbl_skill tbl_skill_skill_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_skill
    ADD CONSTRAINT tbl_skill_skill_key UNIQUE (skill);


--
-- TOC entry 3095 (class 2606 OID 16663)
-- Name: tbl_state tbl_state_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_state
    ADD CONSTRAINT tbl_state_pkey PRIMARY KEY (id);


--
-- TOC entry 3097 (class 2606 OID 16665)
-- Name: tbl_state tbl_state_statename_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_state
    ADD CONSTRAINT tbl_state_statename_key UNIQUE (statename);


--
-- TOC entry 3147 (class 2606 OID 16964)
-- Name: tbl_temp_employee tbl_temp_employee_empid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_empid_key UNIQUE (empid);


--
-- TOC entry 3149 (class 2606 OID 16966)
-- Name: tbl_temp_employee tbl_temp_employee_mobile_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_mobile_key UNIQUE (mobile);


--
-- TOC entry 3151 (class 2606 OID 16960)
-- Name: tbl_temp_employee tbl_temp_employee_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_pkey PRIMARY KEY (id);


--
-- TOC entry 3153 (class 2606 OID 16962)
-- Name: tbl_temp_employee tbl_temp_employee_slno_departmentmappingid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_slno_departmentmappingid_key UNIQUE (slno, departmentmappingid);


--
-- TOC entry 3093 (class 2606 OID 16631)
-- Name: tbl_user_authentication tbl_user_authentication_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user_authentication
    ADD CONSTRAINT tbl_user_authentication_pkey PRIMARY KEY (id);


--
-- TOC entry 3086 (class 2606 OID 16611)
-- Name: tbl_user tbl_user_emailid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user
    ADD CONSTRAINT tbl_user_emailid_key UNIQUE (emailid);


--
-- TOC entry 3088 (class 2606 OID 16613)
-- Name: tbl_user tbl_user_mobile_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user
    ADD CONSTRAINT tbl_user_mobile_key UNIQUE (mobile);


--
-- TOC entry 3090 (class 2606 OID 16609)
-- Name: tbl_user tbl_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user
    ADD CONSTRAINT tbl_user_pkey PRIMARY KEY (id);


--
-- TOC entry 3082 (class 2606 OID 16595)
-- Name: tbl_user_type tbl_user_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user_type
    ADD CONSTRAINT tbl_user_type_pkey PRIMARY KEY (id);


--
-- TOC entry 3084 (class 2606 OID 16597)
-- Name: tbl_user_type tbl_user_type_typename_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user_type
    ADD CONSTRAINT tbl_user_type_typename_key UNIQUE (typename);


--
-- TOC entry 3183 (class 2606 OID 17179)
-- Name: tbl_year tbl_year_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_year
    ADD CONSTRAINT tbl_year_pkey PRIMARY KEY (id);


--
-- TOC entry 3185 (class 2606 OID 17181)
-- Name: tbl_year tbl_year_year_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_year
    ADD CONSTRAINT tbl_year_year_key UNIQUE (year);


--
-- TOC entry 3091 (class 1259 OID 17145)
-- Name: tbl_user_username_uindex; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX tbl_user_username_uindex ON public.tbl_user USING btree (username);


--
-- TOC entry 3311 (class 2606 OID 17776)
-- Name: tbl_applicant_qualification tbl_applicant_qualification_apid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_qualification
    ADD CONSTRAINT tbl_applicant_qualification_apid_fkey FOREIGN KEY (apid) REFERENCES public.tbl_recruitment_application(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3313 (class 2606 OID 17766)
-- Name: tbl_applicant_qualification tbl_applicant_qualification_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_qualification
    ADD CONSTRAINT tbl_applicant_qualification_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3312 (class 2606 OID 17771)
-- Name: tbl_applicant_qualification tbl_applicant_qualification_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_qualification
    ADD CONSTRAINT tbl_applicant_qualification_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3324 (class 2606 OID 18060)
-- Name: tbl_applicant_work_experiance tbl_applicant_work_experiance_apid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_work_experiance
    ADD CONSTRAINT tbl_applicant_work_experiance_apid_fkey FOREIGN KEY (apid) REFERENCES public.tbl_recruitment_application(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3326 (class 2606 OID 18050)
-- Name: tbl_applicant_work_experiance tbl_applicant_work_experiance_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_work_experiance
    ADD CONSTRAINT tbl_applicant_work_experiance_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3325 (class 2606 OID 18055)
-- Name: tbl_applicant_work_experiance tbl_applicant_work_experiance_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_applicant_work_experiance
    ADD CONSTRAINT tbl_applicant_work_experiance_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3331 (class 2606 OID 34778)
-- Name: tbl_assurance tbl_assurance_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_assurance
    ADD CONSTRAINT tbl_assurance_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3341 (class 2606 OID 43391)
-- Name: tbl_attendance tbl_attendance_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_attendance
    ADD CONSTRAINT tbl_attendance_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3328 (class 2606 OID 34694)
-- Name: tbl_attendance_type tbl_attendance_type_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_attendance_type
    ADD CONSTRAINT tbl_attendance_type_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3327 (class 2606 OID 34699)
-- Name: tbl_attendance_type tbl_attendance_type_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_attendance_type
    ADD CONSTRAINT tbl_attendance_type_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3283 (class 2606 OID 17095)
-- Name: tbl_bank_name tbl_bank_name_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_bank_name
    ADD CONSTRAINT tbl_bank_name_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3282 (class 2606 OID 17100)
-- Name: tbl_bank_name tbl_bank_name_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_bank_name
    ADD CONSTRAINT tbl_bank_name_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3321 (class 2606 OID 18019)
-- Name: tbl_communication_details tbl_communication_details_apid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_details
    ADD CONSTRAINT tbl_communication_details_apid_fkey FOREIGN KEY (apid) REFERENCES public.tbl_recruitment_application(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3318 (class 2606 OID 18034)
-- Name: tbl_communication_details tbl_communication_details_commtid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_details
    ADD CONSTRAINT tbl_communication_details_commtid_fkey FOREIGN KEY (commtid) REFERENCES public.tbl_communication_type(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3320 (class 2606 OID 18024)
-- Name: tbl_communication_details tbl_communication_details_dist_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_details
    ADD CONSTRAINT tbl_communication_details_dist_fkey FOREIGN KEY (dist) REFERENCES public.tbl_district(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3323 (class 2606 OID 18009)
-- Name: tbl_communication_details tbl_communication_details_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_details
    ADD CONSTRAINT tbl_communication_details_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3319 (class 2606 OID 18029)
-- Name: tbl_communication_details tbl_communication_details_state_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_details
    ADD CONSTRAINT tbl_communication_details_state_fkey FOREIGN KEY (state) REFERENCES public.tbl_state(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3322 (class 2606 OID 18014)
-- Name: tbl_communication_details tbl_communication_details_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_details
    ADD CONSTRAINT tbl_communication_details_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3317 (class 2606 OID 17926)
-- Name: tbl_communication_type tbl_communication_type_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_type
    ADD CONSTRAINT tbl_communication_type_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3316 (class 2606 OID 17931)
-- Name: tbl_communication_type tbl_communication_type_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_communication_type
    ADD CONSTRAINT tbl_communication_type_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3248 (class 2606 OID 16750)
-- Name: tbl_company tbl_company_companytypeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_companytypeid_fkey FOREIGN KEY (companytypeid) REFERENCES public.tbl_company_type(id) ON UPDATE CASCADE;


--
-- TOC entry 3247 (class 2606 OID 16755)
-- Name: tbl_company tbl_company_distid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_distid_fkey FOREIGN KEY (distid) REFERENCES public.tbl_district(id) ON UPDATE CASCADE;


--
-- TOC entry 3246 (class 2606 OID 16760)
-- Name: tbl_company tbl_company_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3244 (class 2606 OID 16715)
-- Name: tbl_company_type tbl_company_type_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company_type
    ADD CONSTRAINT tbl_company_type_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3243 (class 2606 OID 16720)
-- Name: tbl_company_type tbl_company_type_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company_type
    ADD CONSTRAINT tbl_company_type_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3245 (class 2606 OID 16765)
-- Name: tbl_company tbl_company_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_company
    ADD CONSTRAINT tbl_company_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3339 (class 2606 OID 43333)
-- Name: tbl_datemanagement tbl_datemanagement_datetype_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_datemanagement
    ADD CONSTRAINT tbl_datemanagement_datetype_fkey FOREIGN KEY (datetype) REFERENCES public.tbl_datetype(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3340 (class 2606 OID 43328)
-- Name: tbl_datemanagement tbl_datemanagement_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_datemanagement
    ADD CONSTRAINT tbl_datemanagement_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3338 (class 2606 OID 43313)
-- Name: tbl_datetype tbl_datetype_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_datetype
    ADD CONSTRAINT tbl_datetype_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3258 (class 2606 OID 16870)
-- Name: tbl_department tbl_department_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department
    ADD CONSTRAINT tbl_department_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3263 (class 2606 OID 16920)
-- Name: tbl_department_mapping tbl_department_mapping_companyid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department_mapping
    ADD CONSTRAINT tbl_department_mapping_companyid_fkey FOREIGN KEY (companyid) REFERENCES public.tbl_company(id) ON UPDATE CASCADE;


--
-- TOC entry 3264 (class 2606 OID 16915)
-- Name: tbl_department_mapping tbl_department_mapping_departmentid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department_mapping
    ADD CONSTRAINT tbl_department_mapping_departmentid_fkey FOREIGN KEY (departmentid) REFERENCES public.tbl_department(id) ON UPDATE CASCADE;


--
-- TOC entry 3262 (class 2606 OID 16925)
-- Name: tbl_department_mapping tbl_department_mapping_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department_mapping
    ADD CONSTRAINT tbl_department_mapping_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3310 (class 2606 OID 17728)
-- Name: tbl_recruitment_application tbl_department_mapping_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_recruitment_application
    ADD CONSTRAINT tbl_department_mapping_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3261 (class 2606 OID 16930)
-- Name: tbl_department_mapping tbl_department_mapping_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department_mapping
    ADD CONSTRAINT tbl_department_mapping_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3309 (class 2606 OID 17733)
-- Name: tbl_recruitment_application tbl_department_mapping_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_recruitment_application
    ADD CONSTRAINT tbl_department_mapping_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3257 (class 2606 OID 16875)
-- Name: tbl_department tbl_department_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_department
    ADD CONSTRAINT tbl_department_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3260 (class 2606 OID 16893)
-- Name: tbl_designation tbl_designation_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_designation
    ADD CONSTRAINT tbl_designation_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3259 (class 2606 OID 16898)
-- Name: tbl_designation tbl_designation_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_designation
    ADD CONSTRAINT tbl_designation_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3241 (class 2606 OID 16693)
-- Name: tbl_district tbl_district_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_district
    ADD CONSTRAINT tbl_district_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3242 (class 2606 OID 16688)
-- Name: tbl_district tbl_district_stateid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_district
    ADD CONSTRAINT tbl_district_stateid_fkey FOREIGN KEY (stateid) REFERENCES public.tbl_state(id) ON UPDATE CASCADE;


--
-- TOC entry 3240 (class 2606 OID 16698)
-- Name: tbl_district tbl_district_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_district
    ADD CONSTRAINT tbl_district_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3256 (class 2606 OID 16848)
-- Name: tbl_education tbl_education_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_education
    ADD CONSTRAINT tbl_education_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3255 (class 2606 OID 16853)
-- Name: tbl_education tbl_education_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_education
    ADD CONSTRAINT tbl_education_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3287 (class 2606 OID 17124)
-- Name: tbl_employee_bank_details tbl_employee_bank_details_bankid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_bank_details
    ADD CONSTRAINT tbl_employee_bank_details_bankid_fkey FOREIGN KEY (bankid) REFERENCES public.tbl_bank_name(id) ON UPDATE CASCADE;


--
-- TOC entry 3284 (class 2606 OID 18126)
-- Name: tbl_employee_bank_details tbl_employee_bank_details_empid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_bank_details
    ADD CONSTRAINT tbl_employee_bank_details_empid_fkey FOREIGN KEY (empid) REFERENCES public.tbl_temp_employee(id) ON UPDATE CASCADE;


--
-- TOC entry 3286 (class 2606 OID 17129)
-- Name: tbl_employee_bank_details tbl_employee_bank_details_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_bank_details
    ADD CONSTRAINT tbl_employee_bank_details_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3285 (class 2606 OID 17134)
-- Name: tbl_employee_bank_details tbl_employee_bank_details_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_bank_details
    ADD CONSTRAINT tbl_employee_bank_details_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3280 (class 2606 OID 17043)
-- Name: tbl_employee tbl_employee_departmentmappingid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_departmentmappingid_fkey FOREIGN KEY (departmentmappingid) REFERENCES public.tbl_department_mapping(id) ON UPDATE CASCADE;


--
-- TOC entry 3279 (class 2606 OID 17048)
-- Name: tbl_employee tbl_employee_designationid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_designationid_fkey FOREIGN KEY (designationid) REFERENCES public.tbl_designation(id) ON UPDATE CASCADE;


--
-- TOC entry 3275 (class 2606 OID 17068)
-- Name: tbl_employee tbl_employee_districtid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_districtid_fkey FOREIGN KEY (districtid) REFERENCES public.tbl_district(id) ON UPDATE CASCADE;


--
-- TOC entry 3276 (class 2606 OID 17063)
-- Name: tbl_employee tbl_employee_educationid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_educationid_fkey FOREIGN KEY (educationid) REFERENCES public.tbl_education(id) ON UPDATE CASCADE;


--
-- TOC entry 3274 (class 2606 OID 17073)
-- Name: tbl_employee tbl_employee_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3278 (class 2606 OID 17053)
-- Name: tbl_employee tbl_employee_genderid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_genderid_fkey FOREIGN KEY (genderid) REFERENCES public.tbl_gender(id) ON UPDATE CASCADE;


--
-- TOC entry 3277 (class 2606 OID 17058)
-- Name: tbl_employee tbl_employee_maritalstatusid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_maritalstatusid_fkey FOREIGN KEY (maritalstatusid) REFERENCES public.tbl_marital_status(id) ON UPDATE CASCADE;


--
-- TOC entry 3281 (class 2606 OID 17038)
-- Name: tbl_employee tbl_employee_tempid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_tempid_fkey FOREIGN KEY (tempid) REFERENCES public.tbl_temp_employee(id) ON UPDATE CASCADE;


--
-- TOC entry 3250 (class 2606 OID 16782)
-- Name: tbl_employee_type tbl_employee_type_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_type
    ADD CONSTRAINT tbl_employee_type_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3249 (class 2606 OID 16787)
-- Name: tbl_employee_type tbl_employee_type_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee_type
    ADD CONSTRAINT tbl_employee_type_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3273 (class 2606 OID 17078)
-- Name: tbl_employee tbl_employee_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_employee
    ADD CONSTRAINT tbl_employee_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3315 (class 2606 OID 17900)
-- Name: tbl_experiance_type tbl_experiance_type_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_experiance_type
    ADD CONSTRAINT tbl_experiance_type_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3314 (class 2606 OID 17905)
-- Name: tbl_experiance_type tbl_experiance_type_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_experiance_type
    ADD CONSTRAINT tbl_experiance_type_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3252 (class 2606 OID 16804)
-- Name: tbl_gender tbl_gender_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_gender
    ADD CONSTRAINT tbl_gender_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3251 (class 2606 OID 16809)
-- Name: tbl_gender tbl_gender_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_gender
    ADD CONSTRAINT tbl_gender_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3293 (class 2606 OID 17624)
-- Name: tbl_job_posting tbl_job_posting_companyid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting
    ADD CONSTRAINT tbl_job_posting_companyid_fkey FOREIGN KEY (companyid) REFERENCES public.tbl_company(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3292 (class 2606 OID 17629)
-- Name: tbl_job_posting tbl_job_posting_designationid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting
    ADD CONSTRAINT tbl_job_posting_designationid_fkey FOREIGN KEY (designationid) REFERENCES public.tbl_designation(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3295 (class 2606 OID 17614)
-- Name: tbl_job_posting tbl_job_posting_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting
    ADD CONSTRAINT tbl_job_posting_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3297 (class 2606 OID 17654)
-- Name: tbl_job_posting_qualification tbl_job_posting_qualification_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_qualification
    ADD CONSTRAINT tbl_job_posting_qualification_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3299 (class 2606 OID 17644)
-- Name: tbl_job_posting_qualification tbl_job_posting_qualification_jpid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_qualification
    ADD CONSTRAINT tbl_job_posting_qualification_jpid_fkey FOREIGN KEY (jpid) REFERENCES public.tbl_job_posting(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3298 (class 2606 OID 17649)
-- Name: tbl_job_posting_qualification tbl_job_posting_qualification_qualificationid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_qualification
    ADD CONSTRAINT tbl_job_posting_qualification_qualificationid_fkey FOREIGN KEY (qualificationid) REFERENCES public.tbl_education(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3296 (class 2606 OID 17659)
-- Name: tbl_job_posting_qualification tbl_job_posting_qualification_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_qualification
    ADD CONSTRAINT tbl_job_posting_qualification_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3303 (class 2606 OID 17706)
-- Name: tbl_job_posting_skill tbl_job_posting_skill_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_skill
    ADD CONSTRAINT tbl_job_posting_skill_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3305 (class 2606 OID 17696)
-- Name: tbl_job_posting_skill tbl_job_posting_skill_jpid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_skill
    ADD CONSTRAINT tbl_job_posting_skill_jpid_fkey FOREIGN KEY (jpid) REFERENCES public.tbl_job_posting(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3304 (class 2606 OID 17701)
-- Name: tbl_job_posting_skill tbl_job_posting_skill_skillid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_skill
    ADD CONSTRAINT tbl_job_posting_skill_skillid_fkey FOREIGN KEY (skillid) REFERENCES public.tbl_skill(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3302 (class 2606 OID 17711)
-- Name: tbl_job_posting_skill tbl_job_posting_skill_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting_skill
    ADD CONSTRAINT tbl_job_posting_skill_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3294 (class 2606 OID 17619)
-- Name: tbl_job_posting tbl_job_posting_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_job_posting
    ADD CONSTRAINT tbl_job_posting_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3254 (class 2606 OID 16826)
-- Name: tbl_marital_status tbl_marital_status_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_marital_status
    ADD CONSTRAINT tbl_marital_status_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3253 (class 2606 OID 16831)
-- Name: tbl_marital_status tbl_marital_status_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_marital_status
    ADD CONSTRAINT tbl_marital_status_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3332 (class 2606 OID 34920)
-- Name: tbl_periodtype tbl_periodtype_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_periodtype
    ADD CONSTRAINT tbl_periodtype_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3307 (class 2606 OID 17743)
-- Name: tbl_recruitment_application tbl_recruitment_application_genderid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_recruitment_application
    ADD CONSTRAINT tbl_recruitment_application_genderid_fkey FOREIGN KEY (genderid) REFERENCES public.tbl_gender(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3308 (class 2606 OID 17738)
-- Name: tbl_recruitment_application tbl_recruitment_application_maritalstatusid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_recruitment_application
    ADD CONSTRAINT tbl_recruitment_application_maritalstatusid_fkey FOREIGN KEY (maritalstatusid) REFERENCES public.tbl_marital_status(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3306 (class 2606 OID 17748)
-- Name: tbl_recruitment_application tbl_recruitment_application_religionid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_recruitment_application
    ADD CONSTRAINT tbl_recruitment_application_religionid_fkey FOREIGN KEY (religionid) REFERENCES public.tbl_religion(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3291 (class 2606 OID 17590)
-- Name: tbl_religion tbl_religion_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_religion
    ADD CONSTRAINT tbl_religion_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3290 (class 2606 OID 17595)
-- Name: tbl_religion tbl_religion_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_religion
    ADD CONSTRAINT tbl_religion_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3334 (class 2606 OID 34985)
-- Name: tbl_resource tbl_resource_assurancetypeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource
    ADD CONSTRAINT tbl_resource_assurancetypeid_fkey FOREIGN KEY (assurancetypeid) REFERENCES public.tbl_assurance(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3330 (class 2606 OID 34763)
-- Name: tbl_resource_company tbl_resource_company_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource_company
    ADD CONSTRAINT tbl_resource_company_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3335 (class 2606 OID 34980)
-- Name: tbl_resource tbl_resource_companyid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource
    ADD CONSTRAINT tbl_resource_companyid_fkey FOREIGN KEY (companyid) REFERENCES public.tbl_resource_company(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3337 (class 2606 OID 34970)
-- Name: tbl_resource tbl_resource_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource
    ADD CONSTRAINT tbl_resource_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3333 (class 2606 OID 34990)
-- Name: tbl_resource tbl_resource_periodtypeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource
    ADD CONSTRAINT tbl_resource_periodtypeid_fkey FOREIGN KEY (periodtypeid) REFERENCES public.tbl_periodtype(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3336 (class 2606 OID 34975)
-- Name: tbl_resource tbl_resource_resourcetypeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource
    ADD CONSTRAINT tbl_resource_resourcetypeid_fkey FOREIGN KEY (resourcetypeid) REFERENCES public.tbl_resource_type(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3329 (class 2606 OID 34746)
-- Name: tbl_resource_type tbl_resource_type_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_resource_type
    ADD CONSTRAINT tbl_resource_type_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3301 (class 2606 OID 17676)
-- Name: tbl_skill tbl_skill_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_skill
    ADD CONSTRAINT tbl_skill_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3300 (class 2606 OID 17681)
-- Name: tbl_skill tbl_skill_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_skill
    ADD CONSTRAINT tbl_skill_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3239 (class 2606 OID 16666)
-- Name: tbl_state tbl_state_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_state
    ADD CONSTRAINT tbl_state_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3238 (class 2606 OID 16671)
-- Name: tbl_state tbl_state_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_state
    ADD CONSTRAINT tbl_state_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3272 (class 2606 OID 16967)
-- Name: tbl_temp_employee tbl_temp_employee_departmentmappingid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_departmentmappingid_fkey FOREIGN KEY (departmentmappingid) REFERENCES public.tbl_department_mapping(id) ON UPDATE CASCADE;


--
-- TOC entry 3271 (class 2606 OID 16972)
-- Name: tbl_temp_employee tbl_temp_employee_designationid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_designationid_fkey FOREIGN KEY (designationid) REFERENCES public.tbl_designation(id) ON UPDATE CASCADE;


--
-- TOC entry 3267 (class 2606 OID 16992)
-- Name: tbl_temp_employee tbl_temp_employee_districtid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_districtid_fkey FOREIGN KEY (districtid) REFERENCES public.tbl_district(id) ON UPDATE CASCADE;


--
-- TOC entry 3268 (class 2606 OID 16987)
-- Name: tbl_temp_employee tbl_temp_employee_educationid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_educationid_fkey FOREIGN KEY (educationid) REFERENCES public.tbl_education(id) ON UPDATE CASCADE;


--
-- TOC entry 3266 (class 2606 OID 16997)
-- Name: tbl_temp_employee tbl_temp_employee_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3270 (class 2606 OID 16977)
-- Name: tbl_temp_employee tbl_temp_employee_genderid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_genderid_fkey FOREIGN KEY (genderid) REFERENCES public.tbl_gender(id) ON UPDATE CASCADE;


--
-- TOC entry 3269 (class 2606 OID 16982)
-- Name: tbl_temp_employee tbl_temp_employee_maritalstatusid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_maritalstatusid_fkey FOREIGN KEY (maritalstatusid) REFERENCES public.tbl_marital_status(id) ON UPDATE CASCADE;


--
-- TOC entry 3265 (class 2606 OID 17002)
-- Name: tbl_temp_employee tbl_temp_employee_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_temp_employee
    ADD CONSTRAINT tbl_temp_employee_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3236 (class 2606 OID 16639)
-- Name: tbl_user_authentication tbl_user_authentication_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user_authentication
    ADD CONSTRAINT tbl_user_authentication_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3235 (class 2606 OID 16644)
-- Name: tbl_user_authentication tbl_user_authentication_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user_authentication
    ADD CONSTRAINT tbl_user_authentication_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3237 (class 2606 OID 16634)
-- Name: tbl_user_authentication tbl_user_authentication_userid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user_authentication
    ADD CONSTRAINT tbl_user_authentication_userid_fkey FOREIGN KEY (userid) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3234 (class 2606 OID 16614)
-- Name: tbl_user tbl_user_usertypeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user
    ADD CONSTRAINT tbl_user_usertypeid_fkey FOREIGN KEY (usertypeid) REFERENCES public.tbl_user_type(id) ON UPDATE CASCADE;


--
-- TOC entry 3289 (class 2606 OID 17182)
-- Name: tbl_year tbl_year_entryby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_year
    ADD CONSTRAINT tbl_year_entryby_fkey FOREIGN KEY (entryby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


--
-- TOC entry 3288 (class 2606 OID 17187)
-- Name: tbl_year tbl_year_updatedby_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_year
    ADD CONSTRAINT tbl_year_updatedby_fkey FOREIGN KEY (updatedby) REFERENCES public.tbl_user(id) ON UPDATE CASCADE;


-- Completed on 2020-01-08 18:02:03

--
-- PostgreSQL database dump complete
--

