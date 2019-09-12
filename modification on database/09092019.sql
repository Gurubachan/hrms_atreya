drop table tbl_experiance_type;
drop table tbl_communication_details;
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
