drop table tbl_user_type;
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
	updatedby integer,
	updatedat timestamp,
	isactive boolean default true,
	usertypeshortname varchar(5)
);

alter table tbl_user_type owner to postgres;
alter table tbl_user rename column name to fname;
alter table tbl_user add column mname varchar(20);
alter table tbl_user add column lname varchar(20);
