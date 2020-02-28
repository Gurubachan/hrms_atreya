create table tbl_employee_basic_details(
    id serial  primary key,
    empslno int not null ,
    empdepmappingid int not null references tbl_department_mapping(id) on update cascade on delete restrict ,
    empdesid smallint not null references tbl_designation(id) on update cascade on delete restrict ,
    empfirstname varchar(30) not null ,
    empmiddlename varchar(30) default null,
    emplastname varchar(30) not null ,
    empdob date not null ,
    empdoj date not null default current_date,
    empgenderid smallint not null references tbl_gender(id) on update cascade on delete restrict ,
    empmaritalstatusid smallint not null references tbl_marital_status(id) on update cascade on delete restrict ,
    empfathername varchar(100) default null,
    empmothername varchar(100) default null,
    empspousename varchar(100) default null,
    entryby integer not null references tbl_user on update cascade on delete restrict ,
    createdat timestamp default CURRENT_TIMESTAMP,
    updatedby integer default null references tbl_user on update cascade on delete restrict ,
    updatedat timestamp,
    isactive boolean default true
);
create table tbl_employee_communication(
   id serial  primary key,
   empid int not null references tbl_employee_basic_details(id) on update cascade on delete restrict ,
   empcontact bigint not null unique ,
   check ( empcontact >6000000000),
   empemail varchar(60) not null unique,
   empaddress varchar(200) not null ,
   empaltcontact bigint default null,
   emppresentaddress varchar(200) default null,
   entryby integer not null references tbl_user on update cascade on delete restrict ,
   createdat timestamp default CURRENT_TIMESTAMP,
   updatedby integer default null references tbl_user on update cascade on delete restrict ,
   updatedat timestamp,
   isactive boolean default true
);
create table tbl_employee_qualification(
   id serial  primary key,
   empid int not null references tbl_employee_basic_details(id) on update cascade on delete restrict ,
   empeduid smallint not null references tbl_education(id) on update cascade on delete restrict ,
   empedustream varchar(60) default null,
   empeduboard varchar(100) not null ,
   empregdno varchar(30) default null,
   emppercentage float not null ,
   entryby integer not null references tbl_user on update cascade on delete restrict ,
   createdat timestamp default CURRENT_TIMESTAMP,
   updatedby integer default null references tbl_user on update cascade on delete restrict ,
   updatedat timestamp,
   isactive boolean default true
);
create table tbl_employee_experience(
   id serial  primary key,
   empid int not null references tbl_employee_basic_details(id) on update cascade on delete restrict ,
   companyname varchar(100) not null ,
   fromdate date not null ,
   todate date not null ,
   jobdesid smallint not null references tbl_designation(id) on update cascade on delete restrict ,
   jobrole varchar(100) default null,
   entryby integer not null references tbl_user on update cascade on delete restrict ,
   createdat timestamp default CURRENT_TIMESTAMP,
   updatedby integer default null references tbl_user on update cascade on delete restrict ,
   updatedat timestamp,
   isactive boolean default true
);

alter table tbl_employee_bank_details drop constraint tbl_employee_bank_details_empid_fkey;
truncate table tbl_employee_bank_details;
alter table tbl_employee_bank_details add
foreign key (empid) references tbl_employee_basic_details(id) on update cascade on delete restrict ;


