create table tbl_card_names(
							  id smallserial not null primary key ,
							  cardname varchar(30) not null unique ,
							  entryby integer not null references tbl_user on update cascade on delete restrict ,
							  createdat timestamp default CURRENT_TIMESTAMP,
							  updatedby integer default null references tbl_user on update cascade on delete restrict ,
							  updatedat timestamp,
							  isactive boolean default true
);
create table tbl_employee_card_details(
										  id serial not null primary key ,
										  empid int not null references tbl_employee_basic_details on update cascade on delete restrict ,
										  cardid smallint not null references tbl_card_names on update cascade on delete restrict ,
										  cardnumber varchar(50) not null unique,
										  entryby integer not null references tbl_user on update cascade on delete restrict ,
										  createdat timestamp default CURRENT_TIMESTAMP,
										  updatedby integer default null references tbl_user on update cascade on delete restrict ,
										  updatedat timestamp,
										  isactive boolean default true
);


