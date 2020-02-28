drop view view_job_posting;
drop view view_temp_employee;
drop view view_department_mapping;
alter table tbl_designation alter column designationname type varchar(50) using designationname::varchar(50);


alter table tbl_department alter column departmentname type varchar(50) using departmentname::varchar(50);
alter table tbl_employee_bank_details drop constraint tbl_employee_bank_details_empid_key;
create view view_job_posting(id, companyid, companyname, postname, designationid, designationname, nov, localtion, jobdescription, experiancename, responsibility, startdate, enddate, qualificationid, educationname, skillid, skill, createdat, updatedby, updatedat, isactive) as
SELECT jp.id,
	   jp.companyid,
	   tc.companyname,
	   jp.postname,
	   jp.designationid,
	   td.designationname,
	   jp.nov,
	   jp.localtion,
	   jp.jobdescription,
	   jp.experience AS experiancename,
	   jp.responsibility,
	   jp.startdate,
	   jp.enddate,
	   tjpq.qualificationid,
	   te.educationname,
	   tjps.skillid,
	   ts.skill,
	   jp.createdat,
	   jp.updatedby,
	   jp.createdat  AS updatedat,
	   jp.isactive
FROM ((((((tbl_job_posting jp
	JOIN tbl_job_posting_qualification tjpq ON ((jp.id = tjpq.jpid)))
	JOIN tbl_job_posting_skill tjps ON ((jp.id = tjps.jpid)))
	JOIN tbl_education te ON ((tjpq.qualificationid = te.id)))
	JOIN tbl_skill ts ON ((tjps.skillid = ts.id)))
	JOIN tbl_designation td ON ((jp.designationid = td.id)))
		 JOIN tbl_company tc ON ((jp.companyid = tc.id)));

alter table view_job_posting owner to gurubachan;
create view view_temp_employee(id, slno, fname, mname, lname, departmentmappingid, dob, mobile, emailid, aadharno, address, createdat, designationid, districtid, districtname, statid, statename, doj, dol, educationid, empid, epfno, esifno, fathername, genderid, mothername, maritalstatusid, panno, spousename, updatedat, updatedby, entryby, designationname, gendername, statusname, educationname, companyname, isactive, isattendance) as
SELECT tte.id,
	   tte.slno,
	   tte.fname,
	   tte.mname,
	   tte.lname,
	   tte.departmentmappingid,
	   tte.dob,
	   tte.mobile,
	   tte.emailid,
	   tte.aadharno,
	   tte.address,
	   tte.createdat,
	   tte.designationid,
	   tte.districtid,
	   tdst.distname AS districtname,
	   tdst.stateid  AS statid,
	   ts.statename,
	   tte.doj,
	   tte.dol,
	   tte.educationid,
	   tte.empid,
	   tte.epfno,
	   tte.esifno,
	   tte.fathername,
	   tte.genderid,
	   tte.mothername,
	   tte.maritalstatusid,
	   tte.panno,
	   tte.spousename,
	   tte.updatedat,
	   tte.updatedby,
	   tte.entryby,
	   tdg.designationname,
	   tg.gendername,
	   tms.statusname,
	   te.educationname,
	   tc.companyname,
	   tte.isactive,
	   tte.isattendance
FROM ((((((((tbl_temp_employee tte
	JOIN tbl_department_mapping tdm ON ((tte.departmentmappingid = tdm.id)))
	JOIN tbl_designation tdg ON ((tte.designationid = tdg.id)))
	JOIN tbl_gender tg ON ((tte.genderid = tg.id)))
	JOIN tbl_marital_status tms ON ((tte.maritalstatusid = tms.id)))
	JOIN tbl_district tdst ON ((tte.districtid = tdst.id)))
	JOIN tbl_education te ON ((tte.educationid = te.id)))
	JOIN tbl_state ts ON ((tdst.stateid = ts.id)))
		 JOIN tbl_company tc ON ((tdm.companyid = tc.id)));

alter table view_temp_employee owner to gurubachan;
create view view_department_mapping(id, companytypeid, companytypename, companyid, companyname, departmentid, departmentname, entryby, createdat, updatedby, updatedat, isactive) as
SELECT tdm.id,
	   tc.companytypeid,
	   tct.typename AS companytypename,
	   tdm.companyid,
	   tc.companyname,
	   tdm.departmentid,
	   td.departmentname,
	   tdm.entryby,
	   tdm.createdat,
	   tdm.updatedby,
	   tdm.updatedat,
	   tdm.isactive
FROM (((tbl_department_mapping tdm
	JOIN tbl_company tc ON ((tdm.companyid = tc.id)))
	JOIN tbl_company_type tct ON ((tc.companytypeid = tct.id)))
		 JOIN tbl_department td ON ((tdm.departmentid = td.id)));

alter table view_department_mapping owner to gurubachan;

