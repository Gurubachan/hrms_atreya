alter table tbl_employee_bank_details drop constraint tbl_employee_bank_details_empid_fkey;

alter table tbl_employee_bank_details
	add constraint tbl_employee_bank_details_empid_fkey
		foreign key (empid) references tbl_temp_employee
			on update cascade;
create or replace view view_employee_bank_details (id,empid,fname,mname,lname,bankid,bankname,bankshortname,acno,ifsccode,entryby,createdat,updatedby,updatedat,isactive)as
    select tebd.id,
           tebd.empid,
           tte.fname,
           tte.mname,
           tte.lname,
           tebd.bankid,
           tbn.bankname,
           tbn.bankshortname,
           tebd.acno,
           tebd.ifsccode,
           tebd.entryby,
           tebd.createdat,
           tebd.updatedby,
           tebd.updatedat,
           tebd.isactive
           from(tbl_employee_bank_details tebd join tbl_temp_employee tte on tebd.empid = tte.id
        join tbl_bank_name tbn on tebd.bankid = tbn.id);
