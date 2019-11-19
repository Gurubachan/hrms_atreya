create table tbl_resource_type
(
    id serial primary key,
    typename varchar(20) not null,
    typeshortname varchar(10) not null,
    entryby int not null,
    updatedby int,
    updatedat timestamp,
    createdat timestamp default current_timestamp,
    isactive boolean default true,
    foreign key (entryby)references tbl_user(id) on Delete restrict on update cascade
);
create table tbl_resource_company
(
    id serial primary key,
    companyname varchar(20) not null,
    comapnyshortname varchar(10) not null,
    entryby int not null,
    updatedby int,
    updatedat timestamp,
    createdat timestamp default current_timestamp,
    isactive boolean default true,
    foreign key (entryby)references tbl_user(id) on Delete restrict on update cascade
);
create table tbl_assurance
(
    id serial primary key,
    assurance varchar(20) not null,
    entryby int not null,
    updatedby int,
    updatedat timestamp,
    createdat timestamp default current_timestamp,
    isactive boolean default true,
    foreign key (entryby)references tbl_user(id) on Delete restrict on update cascade
);
create table tbl_periodtype
(
    id serial primary key,
    periodtype varchar(20) not null,
    entryby int not null,
    updatedby int,
    updatedat timestamp,
    createdat timestamp default current_timestamp,
    isactive boolean default true,
    foreign key (entryby)references tbl_user(id) on Delete restrict on update cascade
);
create table tbl_resource
(
    id serial primary key,
    resourcetypeid smallint not null,
    companyid smallint,
    modelnumber varchar(50),
    serialnumber varchar(50),
    purchagingDate date,
    servicecenteraddress varchar(50),
    servicecentermobile bigint,
    assurancetypeid smallint,
    assuranceperiod int,
    periodtypeid int,
    assuranceexpired date,
    entryby int not null,
    updatedby int,
    updatedat timestamp,
    createdat timestamp default current_timestamp,
    isactive boolean default true,
    foreign key (entryby) references tbl_user(id) on Delete restrict on update cascade,
    foreign key (resourcetypeid)references tbl_resource_type on delete restrict on update cascade,
    foreign key (companyid)references tbl_resource_company on delete restrict on update cascade,
    foreign key (assurancetypeid)references tbl_assurance on delete restrict on update cascade,
    foreign key (periodtypeid)references tbl_periodtype on delete restrict on update cascade
);
