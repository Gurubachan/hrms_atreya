drop view view_department_mapping;
alter table tbl_designation alter column designationname type varchar(50) using designationname::varchar(50);

alter table tbl_designation
	add designationshortname varchar(5);

	create view view_department_mapping as
SELECT tdm.id,
       tdm.companyid,
       tc.companyname,
       tdm.departmentid,
       td.departmentname,
       tdm.entryby,
       tdm.createdat,
       tdm.updatedby,
       tdm.updatedat,
       tdm.isactive
FROM ((tbl_department_mapping tdm
  JOIN tbl_company tc ON ((tdm.companyid = tc.id)))
       JOIN tbl_department td ON ((tdm.departmentid = td.id)));

alter table view_department_mapping
  owner to postgres;

alter table tbl_bank_name
	add bankshortname varchar(10);
alter table tbl_company_type
	add typeshortname varchar(10);
alter table tbl_department
	add departmentshortname varchar(10);
alter table tbl_district
	add distshortname varchar(5);
alter table tbl_education
	add educationshortname varchar(10);
alter table tbl_employee_type
	add typeshortname varchar(10);
alter table tbl_gender
	add gendernshortame varchar(5);
alter table tbl_marital_status
	add statusnshortame varchar(5);
alter table tbl_state
	add stateshortname varchar(3);

alter table tbl_user rename column name to fname;
alter table tbl_user add column mname varchar(20);
alter table tbl_user add column lname varchar(20);

