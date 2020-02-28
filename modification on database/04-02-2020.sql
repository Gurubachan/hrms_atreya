alter table tbl_employee_qualification
	add documentupload varchar(200) default null;
alter table tbl_employee_bank_details
	add documentupload varchar(200) default null;
create table tbl_document_type(
								  id smallserial not null primary key ,
								  documenttypename varchar(60) not null unique ,
								  entryby integer not null references tbl_user on update cascade on delete restrict ,
								  createdat timestamp default CURRENT_TIMESTAMP,
								  updatedby integer default null references tbl_user on update cascade on delete restrict ,
								  updatedat timestamp,
								  isactive boolean default true
);
create table tbl_identification_document(
											id serial not null primary key ,
											empid int not null references tbl_employee_basic_details on update cascade on delete restrict ,
											documenttypeid smallint not null references tbl_document_type on update cascade on delete restrict ,
											documentnumber varchar(30) not null unique,
											documentupload varchar(200) default null,
											entryby integer not null references tbl_user on update cascade on delete restrict ,
											createdat timestamp default CURRENT_TIMESTAMP,
											updatedby integer default null references tbl_user on update cascade on delete restrict ,
											updatedat timestamp,
											isactive boolean default true
);
