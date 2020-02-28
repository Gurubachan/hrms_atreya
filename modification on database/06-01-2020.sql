create table tbl_shift_type(
    id smallint primary key ,
    shifttypename varchar(60) not null unique,
    entryby integer not null references tbl_user on update cascade on delete restrict ,
    createdat timestamp default CURRENT_TIMESTAMP,
    updatedby integer default null references tbl_user on update cascade on delete restrict ,
    updatedat timestamp,
    isactive boolean default true
);

create table tbl_shift(
    id serial primary key ,
    companyid smallint not null
                      references tbl_company on update cascade on delete restrict ,
    shifttypeid smallint not null references tbl_shift_type on update cascade on delete restrict ,
    shiftname varchar(60) not null unique ,
    shiftsrtname varchar(10) not null unique ,
    shiftintime time not null ,
    shiftouttime time not null ,
    isdatechange boolean not null default false,
    shiftwef date default current_date,
    entryby integer not null references tbl_user on update cascade on delete restrict ,
    createdat timestamp default CURRENT_TIMESTAMP,
    updatedby integer default null references tbl_user on update cascade on delete restrict ,
    updatedat timestamp,
    isactive boolean default true
);
create table tbl_shift_assign (
    id serial primary key ,
    companyid smallint not null references tbl_company on update cascade on delete restrict ,
    designationid smallint not null references tbl_designation on update cascade on delete restrict ,
    employeeid int references tbl_employee on update cascade on delete restrict ,
    shiftid int not null references tbl_shift on update cascade on delete restrict ,
    shiftassignwef date default current_date,
    entryby integer not null references tbl_user on update cascade on delete restrict ,
    createdat timestamp default CURRENT_TIMESTAMP,
    updatedby integer default null references tbl_user on update cascade on delete restrict ,
    updatedat timestamp,
    isactive boolean default true
);
create table tbl_holiday_calender(
    id serial primary key ,
    companyid smallint not null references tbl_company on update cascade on delete restrict ,
    holidaydate date not null default current_date,
    holidayname varchar(50) not null ,
    entryby integer not null references tbl_user on update cascade on delete restrict ,
    createdat timestamp default CURRENT_TIMESTAMP,
    updatedby integer default null references tbl_user on update cascade on delete restrict ,
    updatedat timestamp,
    isactive boolean default true
);
create table tbl_purpose_of_visit(
     id smallserial primary key ,
     purpose varchar(100) not null unique ,
     entryby integer not null references tbl_user on update cascade on delete restrict ,
     createdat timestamp default CURRENT_TIMESTAMP,
     updatedby integer default null references tbl_user on update cascade on delete restrict ,
     updatedat timestamp,
     isactive boolean default true
);
create table tbl_visitor_list(
     id serial primary key ,
     companyid smallint not null references tbl_company on update cascade on delete restrict ,
     visitorname varchar(100) not null ,
     visitoraddress varchar(200) not null ,
     visitorcontact bigint not null unique check ( visitorcontact > 6000000000 ),
     visitoremail varchar (100) default null,
     genderid smallint not null references tbl_gender on update cascade on delete restrict ,
     entryby integer not null references tbl_user on update cascade on delete restrict ,
     createdat timestamp default CURRENT_TIMESTAMP,
     updatedby integer default null references tbl_user on update cascade on delete restrict ,
     updatedat timestamp,
     isactive boolean default true
);
create table tbl_visitor_register(
     id serial primary key ,
     companyid smallint not null references tbl_company on update cascade on delete restrict ,
     visitorid int not null references tbl_visitor_list on update cascade on delete restrict ,
     visitdate date not null default current_date,
     visittime time not null default current_time,
     purposeofvisitid  smallint not null references tbl_purpose_of_visit on update cascade on delete restrict ,
     contactpersonid int not null references tbl_employee on update cascade on delete restrict ,
     entryby integer not null references tbl_user on update cascade on delete restrict ,
     createdat timestamp default CURRENT_TIMESTAMP,
     updatedby integer default null references tbl_user on update cascade on delete restrict ,
     updatedat timestamp,
     isactive boolean default true
);
