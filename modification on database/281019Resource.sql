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
create view view_resource as
select
        tr.id,
        trt.typename,
       trt.typeshortname,
       trc.id as companyid,
       trc.companyname,
       trc.comapnyshortname,
       tr.modelnumber,
       tr.serialnumber,
       tr.purchagingDate,
       tr.servicecenteraddress,
       tr.servicecentermobile,
       ta.id as assuranceid,
       ta.assurance,
       tp.id as periodid,
       tp.periodtype,
       tr.assuranceexpired,
       tr.entryby,
       tr.updatedby,
       tr.updatedat,
       tr.isactive
  from ( tbl_resource tr left join tbl_resource_type trt on tr.resourcetypeid = trt.id
    left join tbl_resource_company trc on tr.companyid = trc.id
        left join tbl_assurance ta on tr.assurancetypeid = ta.id
            left join tbl_periodtype tp on tr.periodtypeid = tp.id);
