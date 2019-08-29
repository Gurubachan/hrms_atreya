create table if not exists tbl_user_type
(
	id smallserial not null
		constraint tbl_user_type_pkey
			primary key,
	typename varchar(30)
		constraint tbl_user_type_typename_key
			unique,
	entryby integer not null,
	createdat timestamp default CURRENT_TIMESTAMP,
	updatedby integer default null,
	updatedat timestamp,
	isactive boolean default true
);
create table if not exists tbl_user
(
	id serial not null
		constraint tbl_user_pkey
			primary key,
	usertypeid smallint
		constraint tbl_user_usertypeid_fkey
			references tbl_user_type
				on update cascade,
	name varchar(60) not null,
	emailid varchar(60) not null
		constraint tbl_user_emailid_key
			unique,
	mobile bigint not null
		constraint tbl_user_mobile_key
			unique
		constraint tbl_user_mobile_check
			check (mobile > '6000000000'::bigint),
	dob date not null,
	logo varchar(14) default null,
	entryby integer not null,
	createdat timestamp default CURRENT_TIMESTAMP,
	updatedby integer default null,
	updatedat timestamp,
	isactive boolean default true
);
create table if not exists tbl_user_authentication
(
	id serial not null
		constraint tbl_user_authentication_pkey
			primary key,
	userid smallint
		constraint tbl_user_authentication_userid_fkey
			references tbl_user
			on update cascade,
	username text not null
		constraint tbl_user_authentication_username_key
			unique,
	password text not null,
	entryby integer not null
		constraint tbl_user_authentication_entryby_fkey
			references tbl_user
			on update cascade,
	createdat timestamp default CURRENT_TIMESTAMP,
	updatedby integer default null
		constraint tbl_user_authentication_updatedby_fkey
			references tbl_user
			on update cascade,
	updatedat timestamp,
	isactive boolean default true
);
create or replace view view_user as
SELECT u.id,
	   u.usertypeid,
	   u.name,
	   u.emailid,
	   u.mobile,
	   u.dob,
	   u.entryby,
	   u.createdat,
	   u.updatedby,
	   u.updatedat,
	   u.isactive,
	   tut.typename,
	   tut.isactive as typeactive,
	   tua.username,tua.isactive as authactive,u.logo
FROM (tbl_user u
		 JOIN tbl_user_type tut ON ((u.usertypeid = tut.id)) join tbl_user_authentication tua on u.id = tua.userid);

create table if not exists tbl_state(
										id smallserial not null primary key ,
										statename varchar(20) not null unique ,
										entryby int not null references tbl_user on update cascade ,
										createdat timestamp default current_timestamp ,
										updatedby int default null references tbl_user on update cascade ,
										updatedat timestamp default null,
										isactive boolean default true
);

create table if not exists tbl_district(
										   id smallserial not null primary key ,
										   stateid smallint not null references tbl_state on update cascade ,
										   distname varchar(20) not null ,
										   unique (stateid,distname),
										   entryby int not null references tbl_user on update cascade ,
										   createdat timestamp default current_timestamp ,
										   updatedby int default null references tbl_user on update cascade ,
										   updatedat timestamp default null,
										   isactive boolean default true
);
create table if not exists tbl_company_type(
											   id smallserial not null primary key ,
											   typename varchar(20) not null unique ,
											   entryby int not null references tbl_user on update cascade ,
											   createdat timestamp default current_timestamp ,
											   updatedby int default null references tbl_user on update cascade ,
											   updatedat timestamp default null,
											   isactive boolean default true
);
create table if not exists tbl_company(
										  id smallserial not null primary key ,
										  companytypeid smallint not null references tbl_company_type on update cascade ,
										  companyname text not null unique ,
										  companyshortname varchar(5) not null unique ,
										  establishedon date not null ,
										  gstno varchar(30) not null unique,
										  address text not null ,
										  distid smallint not null references tbl_district on update cascade ,
										  pincode int not null check ( pincode > 100000 ),
										  logo varchar(30) default null,
										  url varchar(60) not null unique ,
										  emailid varchar(60) not null unique ,
										  mobile varchar(50) not null ,
										  entryby int not null references tbl_user on update cascade ,
										  createdat timestamp default current_timestamp ,
										  updatedby int default null references tbl_user on update cascade ,
										  updatedat timestamp default null,
										  isactive boolean default true
);
create table if not exists tbl_employee_type(
												id smallserial not null primary key ,
												typename varchar(20) not null unique ,
												entryby int not null references tbl_user on update cascade ,
												createdat timestamp default current_timestamp ,
												updatedby int default null references tbl_user on update cascade ,
												updatedat timestamp default null,
												isactive boolean default true
);
create table if not exists tbl_gender(
										 id smallserial not null primary key ,
										 gendername varchar(20) not null unique ,
										 entryby int not null references tbl_user on update cascade ,
										 createdat timestamp default current_timestamp ,
										 updatedby int default null references tbl_user on update cascade ,
										 updatedat timestamp default null,
										 isactive boolean default true
);
create table if not exists tbl_marital_status(
												 id smallserial not null primary key ,
												 statusname varchar(20) not null unique ,
												 entryby int not null references tbl_user on update cascade ,
												 createdat timestamp default current_timestamp ,
												 updatedby int default null references tbl_user on update cascade ,
												 updatedat timestamp default null,
												 isactive boolean default true
);
create table if not exists tbl_education(
											id smallserial not null primary key ,
											educationname varchar(20) not null unique ,
											entryby int not null references tbl_user on update cascade ,
											createdat timestamp default current_timestamp ,
											updatedby int default null references tbl_user on update cascade ,
											updatedat timestamp default null,
											isactive boolean default true
);

create table if not exists tbl_department(
											 id smallserial not null primary key ,
											 departmentname varchar(20) not null unique ,
											 entryby int not null references tbl_user on update cascade ,
											 createdat timestamp default current_timestamp ,
											 updatedby int default null references tbl_user on update cascade ,
											 updatedat timestamp default null,
											 isactive boolean default true
);
create table if not exists tbl_designation(
											  id smallserial not null primary key ,
											  designationname varchar(20) not null unique ,
											  entryby int not null references tbl_user on update cascade ,
											  createdat timestamp default current_timestamp ,
											  updatedby int default null references tbl_user on update cascade ,
											  updatedat timestamp default null,
											  isactive boolean default true
);

create table if not exists tbl_department_mapping(
													 id serial not null primary key ,
													 departmentid smallint not null references tbl_department on update cascade ,
													 companyid smallint not null references tbl_company on update cascade ,
													 unique(departmentid,companyid),
													 entryby int not null references tbl_user on update cascade ,
													 createdat timestamp default current_timestamp ,
													 updatedby int default null references tbl_user on update cascade ,
													 updatedat timestamp default null,
													 isactive boolean default true
);
create table if not exists tbl_temp_employee(
												id smallserial not null primary key ,
												slno int not null ,
												departmentmappingid int not null references tbl_department_mapping on update cascade ,
												unique(slno,departmentmappingid),
												designationid smallint not null references tbl_designation on update cascade ,
												doj date not null ,
												dol date default null,
												empid varchar(20) not null unique ,
												fname varchar(20) not null ,
												mname  varchar(20) default null,
												lname varchar(20) not null ,
												genderid smallint not null references tbl_gender on update cascade ,
												mobile bigint not null unique,
												emailid varchar(60) default null,
												fathername varchar(60) default null,
												mothername varchar(60) default null ,
												maritalstatusid smallint default null references tbl_marital_status on update cascade ,
												spousename varchar(60) default null,
												educationid smallint not null references tbl_education on update cascade ,
												address varchar(200) default null ,
												districtid smallint default null references tbl_district on update cascade ,
												dob date default null ,
												epfno varchar(30) default null ,
												esifno varchar(30)default null ,
												panno varchar(30) default null ,
												aadharno varchar(30) default null ,
												entryby int not null references tbl_user on update cascade ,
												createdat timestamp default current_timestamp ,
												updatedby int default null references tbl_user on update cascade ,
												updatedat timestamp default null,
												isactive boolean default true,
												isqueue boolean default false,
												isrejeted boolean default false,
												isvalid boolean default false
);
create table if not exists tbl_employee(
										   id smallserial not null primary key ,
										   tempid int not null references tbl_temp_employee on update cascade,
										   slno int not null ,
										   departmentmappingid int not null references tbl_department_mapping on update cascade ,
										   unique(slno,departmentmappingid),
										   designationid smallint not null references tbl_designation on update cascade ,
										   doj date not null ,
										   dol date default null,
										   empid varchar(20) not null unique ,
										   fname varchar(20) not null ,
										   mname  varchar(20) default null,
										   lname varchar(20) not null ,
										   genderid smallint not null references tbl_gender on update cascade ,
										   mobile bigint not null unique ,
										   emailid varchar(60) not null unique ,
										   fathername varchar(60) not null ,
										   mothername varchar(60) not null ,
										   maritalstatusid smallint default null references tbl_marital_status on update cascade ,
										   spousename varchar(60) default null,
										   educationid smallint not null references tbl_education on update cascade ,
										   address varchar(200) not null ,
										   districtid smallint not null references tbl_district on update cascade ,
										   dob date not null ,
										   epfno varchar(30) not null unique ,
										   esifno varchar(30) not null unique ,
										   panno varchar(30) not null unique ,
										   aadharno varchar(30) not null unique ,
										   entryby int not null references tbl_user on update cascade ,
										   createdat timestamp default current_timestamp ,
										   updatedby int default null references tbl_user on update cascade ,
										   updatedat timestamp default null,
										   isactive boolean default true
);

create table if not exists tbl_bank_name(
											id smallserial not null primary key ,
											bankname varchar(60) not null unique ,
											entryby int not null references tbl_user on update cascade ,
											createdat timestamp default current_timestamp ,
											updatedby int default null references tbl_user on update cascade ,
											updatedat timestamp default null,
											isactive boolean default true
);
create table if not exists tbl_employee_bank_details(
														id smallserial not null primary key ,
														empid int not null unique references tbl_employee on update cascade ,
														bankid int not null references tbl_bank_name on update cascade ,
														acno varchar(30) not null unique ,
														ifsccode varchar(12) not null ,
														entryby int not null references tbl_user on update cascade ,
														createdat timestamp default current_timestamp ,
														updatedby int default null references tbl_user on update cascade ,
														updatedat timestamp default null,
														isactive boolean default true
);

drop view view_user;
create view view_user as
select u.id,
       u.usertypeid,
       ut.typename,
       u.name,
       u.emailid,
       u.mobile,
       u.dob,
       u.logo,
       u.isactive,
       u.username,
       tua.password,
       tua.isactive as authisactive,
       ut.isactive as typeisactive
from tbl_user u join tbl_user_type ut on u.usertypeid = ut.id
                join tbl_user_authentication tua on u.id = tua.userid;



alter table tbl_user_authentication drop column username;

create table  tbl_year(
                          id smallserial not null primary key ,
                          year varchar(15) not null unique  ,
                          entryby int not null references tbl_user on update cascade ,
                          createdat timestamp default current_timestamp ,
                          updatedby int default null references tbl_user on update cascade ,
                          updatedat timestamp default null,
                          isactive boolean default true
);



