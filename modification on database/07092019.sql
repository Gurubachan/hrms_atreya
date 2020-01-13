create table tbl_religion
(
	id smallserial primary key,
	religion varchar(20) not null unique ,
	entryby int not null,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp ,
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on delete restrict on update cascade ,
	foreign key (updatedby) references tbl_user(id) on delete restrict on update cascade
);

create table tbl_job_posting
(
	id serial primary key ,
	postname varchar(50) not null ,
	companyid smallint not null ,
	designationid int not null ,
	nov smallint not null check ( nov > '0' :: smallint ) /*No of vacancies*/,
	localtion varchar(20) not null ,
	jobdescriptiom text not null ,
	experiance varchar(10) not null /*experiance in year*/,
	responsibility text  not null ,
	startdate date,
	enddate date,
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,                                        ``
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on delete restrict on update cascade ,
	foreign key (updatedby) references tbl_user (id) on delete restrict on update cascade,
	foreign key (companyid) references tbl_company (id) on  delete restrict on  update cascade ,
	foreign key (designationid) references tbl_designation(id) on delete restrict on update cascade
);
create table tbl_job_posting_qualification
(
	id serial primary key ,
	jpid int not null /* Job posting id*/,
	qualificationid int not null ,
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (jpid) references tbl_job_posting (id) on DELETE restrict on UPDATE cascade ,
	foreign key (qualificationid) references tbl_education (id) on delete restrict on update cascade,
	foreign key (entryby) references tbl_user(id) on delete restrict on update cascade ,
	foreign key (updatedby) references tbl_user (id) on delete restrict on update cascade
);

create table tbl_skill
(
	id serial primary key ,
	skill varchar(20) unique not null ,
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on delete restrict on update cascade ,
	foreign key (updatedby) references tbl_user (id) on delete restrict on update cascade
);

create table tbl_job_posting_skill
(
	id serial primary key ,
	jpid int not null /* Job posting id*/,
	skillid int not null ,
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (jpid) references tbl_job_posting (id) on DELETE restrict on UPDATE cascade ,
	foreign key (skillid) references tbl_skill (id) on delete restrict on update cascade,
	foreign key (entryby) references tbl_user(id) on delete restrict on update cascade ,
	foreign key (updatedby) references tbl_user (id) on delete restrict on update cascade
);

create table tbl_recruitment_application
(
	id serial primary key,
	fname varchar(25) not null ,
	mname varchar(15) ,
	lname varchar(15) not null ,
	fathername varchar(30) ,
	mothername varchar(30),
	spousename varchar(30),
	dob date,
	maritalstatusid smallint,
	genderid smallint,
	religionid smallint,
	contact bigint not null check ( contact >'6000000000' :: bigint),
	altcontact bigint check ( altcontact > '6000000000' :: bigint ),
	whatsapp bigint ,
	email varchar(60),
	entryby integer not null
		constraint tbl_department_mapping_entryby_fkey
			references tbl_user
				on update cascade,
	createdat timestamp default CURRENT_TIMESTAMP,
	updatedby integer
		constraint tbl_department_mapping_updatedby_fkey
			references tbl_user
				on update cascade,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (maritalstatusid) references tbl_marital_status(id) on DELETE restrict on update cascade ,
	foreign key (genderid) references  tbl_gender(id) on delete restrict on update cascade ,
	foreign key (religionid) references tbl_religion(id) on delete restrict on update cascade
);

create table tbl_applicant_qualification
(
	id serial primary key ,
	apid int not null ,
	orgname varchar(50) not null ,
	board varchar(10) not null ,
	examname varchar(10) not null ,
	yop smallint not null check ( yop > '1900' :: smallint ),
	totalmark smallint not null check ( totalmark > '0' :: smallint ),
	securedmark smallint not null check ( securedmark < totalmark :: smallint ),
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on DELETE restrict on update cascade ,
	foreign key (updatedby) references tbl_user(id) on delete restrict on update cascade,
	foreign key (apid) references tbl_recruitment_application (id) on  update cascade on delete restrict
);

create table tbl_experiance_type
(
	id smallint primary key ,
	type varchar(10) unique not null /* (fresher, free lancer, jobee) */,
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on DELETE restrict on update cascade ,
	foreign key (updatedby) references tbl_user(id) on delete restrict on update cascade
);

create table tbl_applicant_work_experiance
(
	id serial primary key ,
	apid int not null ,
	etid smallint not null /* experiance type id*/,
	providedby varchar(30) ,
	startdate date,
	enddate date check ( startdate < enddate :: date ),
	role varchar(20) ,
	remark varchar(255),
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on DELETE restrict on update cascade ,
	foreign key (updatedby) references tbl_user(id) on delete restrict on update cascade,
	foreign key (apid) references tbl_recruitment_application (id) on delete restrict on update cascade
);

create table tbl_communication_type
(
	id smallserial primary key ,
	type varchar(10) not null unique ,
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on DELETE restrict on update cascade ,
	foreign key (updatedby) references tbl_user(id) on delete restrict on update cascade
);

create table tbl_communication_details
(
	id serial primary key ,
	apid int not null ,
	at varchar(25),
	po varchar(25),
	ps varchar(25),
	landmark varchar(25),
	dist int not null ,
	state int not null ,
	pincode int not null,
	commtid smallint not null ,
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on DELETE restrict on update cascade ,
	foreign key (updatedby) references tbl_user(id) on delete restrict on update cascade,
	foreign key (apid) references tbl_recruitment_application(id) on delete restrict on update cascade ,
	foreign key (dist) references tbl_district(id) on delete restrict on update cascade ,
	foreign key (state) references tbl_state(id) on delete restrict on update cascade ,
	foreign key (commtid) references tbl_communication_type (id) on delete restrict on update cascade
);
