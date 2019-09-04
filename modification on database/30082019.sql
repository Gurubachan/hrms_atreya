alter table tbl_state alter column stateshortname
type varchar(10) using stateshortname::varchar(10);

alter table tbl_designation
	add designationshortname varchar(10);
