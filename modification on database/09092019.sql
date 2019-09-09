drop table tbl_experiance_type;
drop table tbl_communication_type;
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
create table tbl_experiance_type
(
    id smallserial primary key ,
    type varchar(10) unique not null /* (fresher, free lancer, jobee) */,
    entryby int not null ,
    createdat timestamp default current_timestamp,
    updatedby int,
    updatedat timestamp,
    isactive boolean default true,
    foreign key (entryby) references tbl_user(id) on DELETE restrict on update cascade ,
    foreign key (updatedby) references tbl_user(id) on delete restrict on update cascade
);
